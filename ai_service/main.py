from fastapi import FastAPI
import pandas as pd
import mysql.connector
from sentence_transformers import SentenceTransformer, util
from sklearn.metrics.pairwise import cosine_similarity
import torch

app = FastAPI()

# ১. এআই মডেল লোড (সার্চের জন্য)
print("Loading AI Model for Search...")
model = SentenceTransformer('paraphrase-multilingual-MiniLM-L12-v2')
print("AI Model is Ready!")

# ডাটাবেস কানেকশন ফাংশন
def get_db_connection():
    return mysql.connector.connect(
        host="localhost",
        user="root",
        password="", 
        database="urbanbazaar"
    )

# ২. পিওর এআই সার্চ এপিআই (Multilingual Semantic Search)
@app.get("/ai-search")
def ai_search(q: str):
    try:
        query_embedding = model.encode(q, convert_to_tensor=True)
        conn = get_db_connection()
        query = """
            SELECT p.id, p.name, p.tags, c.name as category_name 
            FROM products p 
            LEFT JOIN categories c ON p.category_id = c.id 
            WHERE p.status = 1
        """
        df = pd.read_sql(query, conn)
        conn.close()

        if df.empty: return {"product_ids": []}

        df['combined'] = (df['name'].fillna('') + " " + df['tags'].fillna('') + " " + df['category_name'].fillna('')).str.lower()
        product_embeddings = model.encode(df['combined'].tolist(), convert_to_tensor=True)

        cosine_scores = util.cos_sim(query_embedding, product_embeddings)[0]
        df['score'] = cosine_scores.tolist()

        # থ্রেশহোল্ড ০.২৫ (বড় বাক্যের জন্য এটি কাজ করবে)
        results = df[df['score'] > 0.25].sort_values(by='score', ascending=False).head(12)
        return {"product_ids": results['id'].tolist()}

    except Exception as e:
        print(f"Search Error: {e}")
        return {"error": str(e), "product_ids": []}


# ৩. ইউজার ভিত্তিক রিকমেন্ডেশন (Collaborative Filtering - Updated)
@app.get("/recommend/{user_id}")
def recommend(user_id: int):
    try:
        conn = get_db_connection()
        # ইউজার ইন্টারঅ্যাকশন ডাটা নেওয়া
        df = pd.read_sql("SELECT user_id, product_id, weight FROM user_interactions", conn)
        conn.close()
        
        if df.empty: 
            return {"recommendations": []}
        
        # ইউজার-আইটেম ম্যাট্রিক্স তৈরি (Pivot Table)
        matrix = df.pivot_table(index='user_id', columns='product_id', values='weight').fillna(0)
        
        if user_id not in matrix.index:
            # যদি এই ইউজারের ডাটা না থাকে, তবে জনপ্রিয় কিছু প্রোডাক্ট পাঠানো যেতে পারে
            return {"recommendations": []}

        # এআই অ্যালগরিদম: কসাইন সিমিলারিটি ক্যালকুলেশন
        user_sim = cosine_similarity(matrix)
        user_sim_df = pd.DataFrame(user_sim, index=matrix.index, columns=matrix.index)

        # ১. বর্তমান ইউজারের সাথে সবচেয়ে মিল থাকা ৪-৫ জন ইউজার খুঁজে বের করা
        similar_users = user_sim_df[user_id].sort_values(ascending=False).iloc[1:6].index.tolist()
        
        # ২. ওই সিমিলার ইউজারদের পছন্দের প্রোডাক্ট আইডি বের করা
        recommendations = df[df['user_id'].isin(similar_users)]['product_id'].unique().tolist()
        
        # ৩. ইউজার অলরেডি যা দেখেছে বা কিনেছে তা বাদ দেওয়া (স্মার্ট ফিল্টারিং)
        user_seen = df[df['user_id'] == user_id]['product_id'].tolist()
        final_recom = [p for p in recommendations if p not in user_seen]
        
        print(f"AI: Recommending {len(final_recom)} products for User ID {user_id}")
        
        return {"recommendations": final_recom[:10]}
    
    except Exception as e:
        print(f"Recommendation Error: {e}")
        return {"error": str(e), "recommendations": []}