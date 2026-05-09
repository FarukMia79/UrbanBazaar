<template>
    <div id="content">
        <section class="product-section">
            <div class="container">
                <div class="sorting-section">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="category-breadcrumb d-flex align-items-center">
                                <router-link :to="{ name: 'index' }">Home</router-link>
                                <span>/</span>
                                <strong>Offers</strong>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="showing-data">
                                        <span>Showing {{ sortedProducts.length }} Results</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="filter_sort d-flex align-items-center justify-content-between gap-2">
                                        <div class="filter_btn shadow-sm d-md-none" @click="toggleSidebar">
                                            <i class="fa fa-list-ul"></i>
                                        </div>
                                        <div class="page-sort flex-grow-1">
                                            <form action="#" class="sort-form">
                                                <select name="sort" class="form-control form-select sort"
                                                    v-model="sortBy">
                                                    <option value="1">
                                                        Product: Latest
                                                    </option>
                                                    <option value="2">
                                                        Product: Oldest
                                                    </option>
                                                    <option value="3">
                                                        Price: High To Low
                                                    </option>
                                                    <option value="4">
                                                        Price: Low To High
                                                    </option>
                                                    <option value="5">
                                                        Name: A-Z
                                                    </option>
                                                    <option value="6">
                                                        Name: Z-A
                                                    </option>
                                                </select>
                                                <input type="hidden" name="min_price" value="" />
                                                <input type="hidden" name="max_price" value="" />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-sm-9">
                        <div class="category-product main_product_inner">
                            <div v-for="product in sortedProducts" :key="product.id"
                                class="product_item wist_item wow zoomIn">
                                <div class="product_item_inner">
                                    <div class="sale-badge">
                                        <div class="sale-badge-inner">
                                            <div class="sale-badge-box">
                                                <span class="sale-badge-text">
                                                    <p>
                                                        {{
                                                            calculateDiscount(
                                                                product.price,
                                                                product.discount_price,
                                                            )
                                                        }}%
                                                    </p>
                                                    ছাড়
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro_img">
                                        <router-link :to="{
                                            name: 'SingleProduct',
                                            params: { id: product.id },
                                        }">
                                            <img :src="'/' + product.image" :alt="product.name" />
                                        </router-link>
                                    </div>
                                    <div class="pro_des">
                                        <div class="pro_name">
                                            <router-link :to="{
                                                name: 'SingleProduct',
                                                params: { id: product.id },
                                            }">
                                                {{ product.name }}
                                            </router-link>
                                        </div>
                                    </div>
                                </div>

                                <div class="pro_price">
                                    <p v-if="product.discount_price">
                                        <del>৳ {{ product.price }}</del>
                                        ৳ {{ product.discount_price }}
                                    </p>
                                    <p v-else>৳ {{ product.price }}</p>
                                </div>
                                <div class="pro_btn d-flex justify-content-between align-items-center gap-2">
                                    <!-- Buy Now বাটন -->
                                    <router-link :to="{
                                        name: 'SingleProduct',
                                        params: { id: product.id },
                                    }" class="btn btn-sm w-100" style="
                                            background-color: #3f0051;
                                            color: #ffffff;
                                            border: none;
                                        ">
                                        Buy Now
                                    </router-link>

                                    <!-- কার্ট আইকন বাটন -->
                                    <a class="btn btn-sm addcartbutton" data-id="37" style="
                                            width: 40px;
                                            padding: 4px;
                                            background-color: transparent;
                                            color: #3f0051;
                                            border: 1px solid #3f0051;
                                        ">
                                        <i class="fas fa-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="custom_paginate"></div>
                    </div>
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
            sortBy: '1',
        };
    },
    mounted() {
        this.getOfferProducts();
    },
    computed: {
        sortedProducts() {
            if (!this.products) return [];

            let productsList = [...this.products];

            const getEffectivePrice = (p) => {
                return p.discount_price && parseFloat(p.discount_price) > 0
                    ? parseFloat(p.discount_price)
                    : parseFloat(p.price);
            };

            if (this.sortBy === '1') return productsList.sort((a, b) => b.id - a.id);
            if (this.sortBy === '2') return productsList.sort((a, b) => a.id - b.id);
            if (this.sortBy === '3') return productsList.sort((a, b) => getEffectivePrice(b) - getEffectivePrice(a));
            if (this.sortBy === '4') return productsList.sort((a, b) => getEffectivePrice(a) - getEffectivePrice(b));
            if (this.sortBy === '5') return productsList.sort((a, b) => a.name.localeCompare(b.name));
            if (this.sortBy === '6') return productsList.sort((a, b) => b.name.localeCompare(a.name));

            return productsList;
        }
    },
    methods: {
        calculateDiscount(price, discountPrice) {
            if (!price || !discountPrice) return 0;
            return Math.round(((price - discountPrice) / price) * 100);
        },
        getOfferProducts() {
            axios.get('/api/product')
                .then((res) => {
                    this.products = res.data.filter(p => p.discount_price != null && p.discount_price > 0);
                })
                .catch((error) => {
                    console.error("Error fetching offers:", error);
                });
        },
        toggleSidebar() {
            this.isSidebarOpen = !this.isSidebarOpen;
        },
    }
};
</script>

<style scoped>
.filter_close {
    background-color: #3f0051 !important;
}

.filter_btn {
    display: none;
}

@media (max-width: 767px) {
    .filter_btn {
        display: flex;
        background-color: #750377;
        color: white;
        width: 45px;
        height: 40px;
        align-items: center;
        justify-content: center;
        border-radius: 5px;
        cursor: pointer;
        margin-right: 10px;
    }
}

.filter_sort {
    display: flex;
    align-items: center;
}

.filter_btn {
    background-color: #750377;
    color: white;
    width: 45px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

.filter_btn:hover {
    background-color: #3f0051;
}

@media (max-width: 767px) {
    .filter_sidebar {
        position: fixed;
        top: 0;
        left: -100%;
        width: 280px;
        height: 100%;
        background: white;
        z-index: 9999;
        transition: 0.4s;
        box-shadow: 2px 0 15px rgba(0, 0, 0, 0.2);
        padding: 20px;
        overflow-y: auto;
    }

    .filter_sidebar.active {
        left: 0;
    }

    .sorting-section .row>div {
        margin-bottom: 10px;
    }
}
</style>