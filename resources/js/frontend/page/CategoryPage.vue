<template lang="">
    <div id="content">
        <section class="product-section">
            <div class="container">
                <div class="sorting-section">
                    <div class="row">
                        <div class="col-sm-6">
                            <div
                                class="category-breadcrumb d-flex align-items-center"
                            >
                                <router-link :to="{name: 'index'}">Home</router-link>
                                <span>/</span>
                                <strong>{{ category.name }}</strong>
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
                                                <select
                                                    name="sort" class="form-control form-select sort" v-model="sortBy"
                                                >
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
                                                <input
                                                    type="hidden"
                                                    name="min_price"
                                                    value=""
                                                />
                                                <input
                                                    type="hidden"
                                                    name="max_price"
                                                    value=""
                                                />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3 filter_sidebar" :class="{ 'active': isSidebarOpen }">
                        <div class="filter_close" @click="toggleSidebar">
                            <i class="fa fa-long-arrow-left"></i> Close Filter
                        </div>
                        <form action="#" class="attribute-submit">
                            <div class="sidebar_item wraper__item">
                                <div class="accordion" id="category_sidebar">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button
                                                class="accordion-button"
                                                type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapseCat"
                                                aria-expanded="true"
                                                aria-controls="collapseOne"
                                            >
                                                {{ category.name }}
                                            </button>
                                        </h2>
                                        <div
                                            id="collapseCat"
                                            class="accordion-collapse collapse show"
                                            data-bs-parent="#category_sidebar"
                                        >
                                            <div
                                                class="accordion-body cust_according_body"
                                            >
                                                <ul>
                                                    <li
                                                        v-for="sub in category.subcategories"
                                                        :key="sub.id"
                                                    >
                                                        <router-link
                                                            :to="{
                                                                name: 'SubCategoryPage',
                                                                params: {
                                                                    id: sub.id,
                                                                },
                                                            }"
                                                        >
                                                            {{ sub.name }}
                                                        </router-link>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--sidebar item end-->
                            <div class="sidebar_item wraper__item">
                                <div class="accordion" id="price_sidebar">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button
                                                class="accordion-button"
                                                type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapsePrice"
                                                aria-expanded="true"
                                                aria-controls="collapseOne"
                                            >
                                                Price
                                            </button>
                                        </h2>
                                        <div
                                            id="collapsePrice"
                                            class="accordion-collapse collapse show"
                                            data-bs-parent="#price_sidebar"
                                        >
                                            <div
                                                class="accordion-body cust_according_body"
                                            >
                                                <div
                                                    class="category-filter-box category__wraper"
                                                    id="categoryFilterBox"
                                                >
                                                    <div
                                                        class="category-filter-item"
                                                    >
                                                        <div
                                                            class="filter-body"
                                                        >
                                                            <div
                                                                class="slider-box"
                                                            >
                                                                <div
                                                                    class="filter-price-inputs"
                                                                >
                                                                    <p
                                                                        class="min-price"
                                                                    >
                                                                        ৳<input
                                                                            type="text"
                                                                            name="min_price"
                                                                            id="min_price"
                                                                            readonly=""
                                                                        />
                                                                    </p>
                                                                    <p
                                                                        class="max-price"
                                                                    >
                                                                        ৳<input
                                                                            type="text"
                                                                            name="max_price"
                                                                            id="max_price"
                                                                            readonly=""
                                                                        />
                                                                    </p>
                                                                </div>
                                                                <div
                                                                    id="price-range"
                                                                    class="slider form-attribute"
                                                                ></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--sidebar item end-->
                            <div class="sidebar_item wraper__item">
                                <div class="accordion" id="filter_sidebar">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button
                                                class="accordion-button"
                                                type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapseFilter"
                                                aria-expanded="true"
                                                aria-controls="collapseOne"
                                            >
                                                Filter
                                            </button>
                                        </h2>
                                        <div
                                            id="collapseFilter"
                                            class="accordion-collapse collapse show"
                                            data-bs-parent="#filter_sidebar"
                                        >
                                            <div
                                                class="accordion-body cust_according_body"
                                            >
                                                <div class="filter-body">
                                                    <ul class="space-y-3">
                                                        <li
                                                            class="subcategory-filter-list"
                                                        >
                                                            <label
                                                                for="demo-14"
                                                                class="subcategory-filter-label"
                                                            >
                                                                <input
                                                                    class="form-checkbox form-attribute"
                                                                    id="demo-14"
                                                                    name="subcategory[]"
                                                                    value="14"
                                                                    type="checkbox"
                                                                />
                                                                <p
                                                                    class="subcategory-filter-name"
                                                                >
                                                                    demo
                                                                </p>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--sidebar item end-->
                        </form>
                    </div>
                    <div class="col-sm-9">
                        <div class="category-product main_product_inner">
                            <div
                                v-for="product in sortedProducts" :key="product.id" class="product_item wist_item wow zoomIn"
                            >
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
                                        <router-link
                                            :to="{
                                                name: 'SingleProduct',
                                                params: { id: product.id },
                                            }"
                                        >
                                            <img
                                                :src="'/' + product.image"
                                                :alt="product.name"
                                            />
                                        </router-link>
                                    </div>
                                    <div class="pro_des">
                                        <div class="pro_name">
                                            <router-link
                                                :to="{
                                                    name: 'SingleProduct',
                                                    params: { id: product.id },
                                                }"
                                            >
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
                                <div
                                    class="pro_btn d-flex justify-content-between align-items-center gap-2"
                                >
                                    <!-- Buy Now বাটন -->
                                    <router-link
                                        :to="{
                                            name: 'SingleProduct',
                                            params: { id: product.id },
                                        }"
                                        class="btn btn-sm w-100"
                                        style="
                                            background-color: #3f0051;
                                            color: #ffffff;
                                            border: none;
                                        "
                                    >
                                        Buy Now
                                    </router-link>

                                    <!-- কার্ট আইকন বাটন -->
                                    <a
                                        class="btn btn-sm addcartbutton"
                                        data-id="37"
                                        style="
                                            width: 40px;
                                            padding: 4px;
                                            background-color: transparent;
                                            color: #3f0051;
                                            border: 1px solid #3f0051;
                                        "
                                    >
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
    <!-- content end -->
</template>
<script>
import axios from 'axios';

export default {
    data() {
        return {
            category: {
                products: []
            },
            id: this.$route.params.id,
            sortBy: '1',
            isSidebarOpen: false,
        };
    },
    mounted() {
        this.getCategoryData();
    },
    computed: {
        sortedProducts() {
            if (!this.category.products) return [];

            let products = [...this.category.products];

            const getEffectivePrice = (p) => {
                if (p.discount_price && parseFloat(p.discount_price) > 0) {
                    return parseFloat(p.discount_price);
                }
                return parseFloat(p.price);
            };

            if (this.sortBy === '1') { // Latest
                return products.sort((a, b) => b.id - a.id);
            } else if (this.sortBy === '2') { // Oldest
                return products.sort((a, b) => a.id - b.id);
            } else if (this.sortBy === '3') { // Price: High To Low
                return products.sort((a, b) => getEffectivePrice(b) - getEffectivePrice(a));
            } else if (this.sortBy === '4') { // Price: Low To High
                return products.sort((a, b) => getEffectivePrice(a) - getEffectivePrice(b));
            } else if (this.sortBy === '5') { // Name: A-Z
                return products.sort((a, b) => a.name.localeCompare(b.name));
            } else if (this.sortBy === '6') { // Name: Z-A
                return products.sort((a, b) => b.name.localeCompare(a.name));
            }
            return products;
        }
    },
    methods: {
        calculateDiscount(price, discountPrice) {
            if (!price || !discountPrice) return 0;
            let diff = price - discountPrice;
            return Math.round((diff / price) * 100);
        },
        getCategoryData() {
            axios
                .get(`/api/category/${this.id}`)
                .then((res) => {
                    this.category = res.data;
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        toggleSidebar() {
            this.isSidebarOpen = !this.isSidebarOpen;
        },
    },
    watch: {
        "$route.params.id"(newId) {
            this.id = newId;
            this.getCategoryData();
        },
    },
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