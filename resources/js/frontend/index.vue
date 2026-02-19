<template>
    <div id="content">
        <section class="slider-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 hidetosm">
                        <div class="sidebar-menu">
                            <ul class="hideshow">
                                <li v-for="category in categories" :key="category.id">
                                    <router-link :to="{ name: 'CategoryPage', params: { id: category.id } }">
                                        <img :src="'/' + category.image" alt="" />
                                        {{ category.name }}
                                        <i v-if="category.subcategories && category.subcategories.length > 0"
                                            class="fa-solid fa-chevron-right"></i>
                                    </router-link>

                                    <ul class="sidebar-submenu"
                                        v-if="category.subcategories && category.subcategories.length > 0">
                                        <li v-for="sub in category.subcategories" :key="sub.id">
                                            <router-link :to="{ name: 'SubCategoryPage', params: { id: sub.id } }">
                                                {{ sub.name }}
                                            </router-link>
                                        </li>
                                    </ul>
                                </li>
                                <li v-if="categories.length == 0" class="p-3 text-muted small">Loading...</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-9">
                        <div class="home-slider-container">
                            <div class="main_slider owl-carousel">
                                <div class="slider-item">
                                    <img :src="`/uploads/banner/1761398976jewellery-app-wide-banners.webp`" alt=""
                                        class="main-slider-style" />
                                </div>

                                <div class="slider-item">
                                    <img :src="`/uploads/banner/1757232812_mouse`" alt="" class="main-slider-style" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- slider end -->
        <!--
        <section class="bottoads_area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="bottoads_inner">
                            <div class="ads_item">
                                <a href="#">
                                    <img :src="`/uploads/banner/1757233375Untitled design (12).png`" alt="" />
                                </a>
                            </div>
                            <div class="ads_item">
                                <a href="#">
                                    <img :src="`/uploads/banner/1757233358Untitled design (4).png`" alt="" />
                                </a>
                            </div>
                            <div class="ads_item">
                                <a href="#">
                                    <img :src="`/uploads/banner/1757233350Untitled design (7).png`" alt="" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->
        <section class="homeproduct">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="sec_title">
                            <h3 class="section-title-header">
                                <div class="timer_inner">
                                    <div class="">
                                        <span class="section-title-name">
                                            Categories
                                        </span>
                                    </div>
                                </div>
                            </h3>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div v-if="categories.length > 0" class="category-slider owl-carousel">
                            <div v-for="category in categories" :key="category.id" class="cat_item">
                                <div class="cat_img">
                                    <router-link :to="{ name: 'CategoryPage', params: { id: category.id } }"
                                        class="text-decoration-none"><img :src="'/' + category.image"
                                            alt="" /></router-link>
                                </div>
                                <div class="cat_name">
                                    <router-link class="text-decoration-none"
                                        :to="{ name: 'CategoryPage', params: { id: category.id } }">
                                        {{ category.name }}
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="homeproduct">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="sec_title">
                            <h3 class="section-title-header">
                                <div class="timer_inner">
                                    <div class="">
                                        <span class="section-title-name">
                                            Hot Deal
                                        </span>
                                    </div>

                                    <div class="">
                                        <div class="offer_timer" id="simple_timer"></div>
                                    </div>
                                </div>
                            </h3>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="product_slider owl-carousel">
                            <div v-for="product in products" :key="product.id" class="product_item wist_item wow zoomIn"
                                data-wow-duration="1.5s" data-wow-delay="0.0s">
                                <div class="product_item_inner">
                                    <div class="sale-badge">
                                        <div class="sale-badge-inner">
                                            <div class="sale-badge-box">
                                                <span class="sale-badge-text">
                                                    <p>{{ calculateDiscount(product.price, product.discount_price) }}%
                                                    </p>
                                                    OFF
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro_img">
                                        <router-link :to="{ name: 'SingleProduct', params: { slug: product.slug } }">
                                            <img :src="'/' + product.image" :alt="product.name" />
                                        </router-link>
                                    </div>
                                    <div class="pro_des">
                                        <div class="pro_name">
                                            <router-link :to="{ name: 'SingleProduct', params: { slug: product.slug } }">{{ product.name }}</router-link>
                                        </div>
                                    </div>
                                </div>

                                <div class="pro_price">
                                    <p>
                                        <del>৳ {{ product.price }}</del>
                                        ৳ {{ product.discount_price }}
                                    </p>
                                </div>
                                <div class="pro_btn d-flex justify-content-between align-items-center gap-2">
                                    <a href="product/laravel-v6-ecommerce-65.html" class="btn btn-sm w-100" style="
                                            flex: 1;
                                            background-color: #3f0051;
                                            color: #ffffff;
                                            border: none;
                                        ">
                                        Order Now
                                    </a>

                                    <a href="javascript:void(0)" class="btn btn-sm add-to-cart-btn" data-id="62" style="
                                            width: 40px;
                                            padding: 4px;
                                            background-color: transparent;
                                            color: #ffffff;
                                            border: 1px solid #3f0051;
                                        ">
                                        <i class="fas fa-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <a href="hot-deals.html" class="view_more_btn" style="float: left">View More</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "HomeContent",
    data() {
        return {
            categories: [],
            products: [],
        }
    },
    methods: {
        getProductData() {
            axios.get('/api/product')
                .then((res) => {
                    this.products = res.data;

                    this.$nextTick(() => {
                        if (typeof window.$ !== "undefined") {
                            window.$(".product_slider").owlCarousel('destroy'); // আগেরটা থাকলে রিসেট
                            window.$(".product_slider").owlCarousel({
                                loop: this.products.length > 4, // প্রোডাক্ট ৪টার বেশি হলে লুপ হবে
                                margin: 15,
                                nav: true,
                                dots: false,
                                autoplay: true,
                                responsive: { 0: { items: 2 }, 600: { items: 3 }, 1000: { items: 5 } }
                            });
                        }
                    });

                }).catch((error) => {
                    console.error("API Error:", error);
                });
        },
        calculateDiscount(price, discountPrice) {
            if (!price || !discountPrice) return 0;
            let diff = price - discountPrice;
            return Math.round((diff / price) * 100);
        },
        getSidebarData() {
            axios.get('/api/category')
                .then((res) => {
                    this.categories = res.data;

                    setTimeout(() => {
                        if (typeof window.$ !== "undefined") {
                            window.$(".category-slider").owlCarousel({
                                loop: true,
                                margin: 10,
                                nav: true,
                                dots: true,
                                responsive: {
                                    0: { items: 2 },
                                    600: { items: 4 },
                                    1000: { items: 8 },
                                },
                            });
                        }
                    }, 100);

                }).catch((error) => {
                    console.log(error);
                });
        }
    },
    mounted() {
        this.getProductData();
        this.getSidebarData();

        setTimeout(() => {
            if (typeof window.$ !== "undefined") {
                window.$(".main_slider").owlCarousel({
                    items: 1,
                    loop: true,
                    autoplay: true,
                    dots: true,
                    nav: false
                });
            }
        }, 500);
    },
};
</script>

<style scoped>
:deep(.owl-dots) {
    text-align: center;
    margin-top: 15px;
}

:deep(.owl-dot span) {
    width: 10px !important;
    height: 10px !important;
    margin: 5px 7px !important;
    background: #ccc !important;
    display: block;
    border-radius: 30px;
    transition: all 0.3s ease;
}

:deep(.owl-dot.active span),
:deep(.owl-dot:hover span) {
    background: #3f0051 !important;
    width: 25px !important;
}

.cat_name a {
    color: black;
    text-decoration: none !important;
}

.product_item a {
    text-decoration: none;
}

.product_item p {
    margin-bottom: 0px;
}
</style>
