from fastapi import FastAPI
import pandas as pd
from sklearn.metrics.pairwise import cosine_similarity
import mysql.connector

app = FastAPI()

def get_db_data():
    conn = mysql.connector.connect(host="localhost", user="root", password="", database="urbanbazaar")
    df = pd.read_sql("SELECT user_id, product_id, weight FROM user_interactions", conn)
    conn.close()
    return df

@app.get("/recommend/{user_id}")
def recommend(user_id: int):
    df = get_db_data()
    if df.empty: return {"recommendations": []}

    # ইউজার-আইটেম ম্যাট্রিক্স (Pivot Table)
    matrix = df.pivot_table(index='user_id', columns='product_id', values='weight').fillna(0)

    if user_id not in matrix.index:
        return {"recommendations": []}

    # Cosine Similarity Calculation (The 'AI' Part)
    user_sim = cosine_similarity(matrix)
    user_sim_df = pd.DataFrame(user_sim, index=matrix.index, columns=matrix.index)

    # সিমিলার ইউজার খুঁজে বের করা
    similar_users = user_sim_df[user_id].sort_values(ascending=False).iloc[1:6].index.tolist()
    
    # রিকমেন্ডেশন লিস্ট তৈরি
    recom_ids = df[df['user_id'].isin(similar_users)]['product_id'].unique().tolist()
    
    return {"recommendations": recom_ids[:10]}