<template>
    <div id="content">
        <section class="product-section mt-5">
            <div class="container">
                <div class="sec_title mb-4">
                    <h3 class="fw-bold">
                        <i class="fa fa-robot text-primary me-2"></i>
                        AI Search Results for: <span class="text-indigo">"{{ searchQuery }}"</span>
                    </h3>
                    <p class="text-muted small">Our AI engine found these products based on your request.</p>
                </div>

                <!-- Loading State -->
                <div v-if="loading" class="text-center p-5">
                    <div class="spinner-border text-primary" role="status"></div>
                    <p class="mt-2">AI is thinking...</p>
                </div>

                <div class="row g-4" v-if="!loading && products.length > 0">
                    <div v-for="product in products" :key="product.id" class="col-6 col-md-4 col-lg-3">
                        <div class="product_item wist_item border rounded shadow-sm p-2">
                            <div class="product_item_inner">
                                <div class="pro_img">
                                    <router-link :to="{ name: 'SingleProduct', params: { id: product.id } }">
                                        <img :src="'/' + product.image" :alt="product.name" class="img-fluid rounded" />
                                    </router-link>
                                </div>
                                <div class="pro_des mt-2">
                                    <div class="pro_name">
                                        <router-link :to="{ name: 'SingleProduct', params: { id: product.id } }"
                                            class="text-decoration-none text-dark fw-bold">
                                            {{ product.name.substring(0, 40) }}...
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                            <div class="pro_price mt-2">
                                <p class="mb-0">
                                    <span class="text-success fw-bold">৳{{ product.discount_price ?
                                        product.discount_price : product.price }}</span>
                                    <del v-if="product.discount_price" class="text-muted ms-2 small">৳{{ product.price
                                        }}</del>
                                </p>
                            </div>
                            <!-- AI Confidence Badge -->
                            <div class="mt-2">
                                <span class="badge bg-soft-primary text-primary border border-primary small">
                                    <i class="fa fa-sparkles me-1"></i> AI Recommended
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- No Results -->
                <div v-if="!loading && products.length === 0" class="text-center p-5">
                    <img src="https://cdn-icons-png.flaticon.com/512/6134/6134065.png" width="100" alt="No Result">
                    <h4 class="mt-3 text-muted">Sorry, our AI couldn't find any exact matches.</h4>
                    <router-link :to="{ name: 'index' }" class="btn btn-primary mt-3">Go Back Home</router-link>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            products: [],
            loading: true,
            searchQuery: this.$route.query.q || ''
        }
    },
    methods: {
        fetchAISearchResults() {
            this.loading = true;
            axios.get(`/api/ai-product-search?q=${this.searchQuery}`)
                .then(res => {
                    this.products = res.data;
                    this.loading = false;
                })
                .catch(err => {
                    console.error("AI Search Error:", err);
                    this.loading = false;
                });
        }
    },
    mounted() {
        this.fetchAISearchResults();
    },
    watch: {
        // যদি ইউজার পেজে থাকা অবস্থায় আবার সার্চ করে
        '$route.query.q'(newQuery) {
            this.searchQuery = newQuery;
            this.fetchAISearchResults();
        }
    }
}
</script>

<style scoped>
.bg-soft-primary {
    background-color: #e7f1ff;
}

.text-indigo {
    color: #4b1091;
}

.product_item:hover {
    transform: translateY(-5px);
    transition: 0.3s;
}
</style>