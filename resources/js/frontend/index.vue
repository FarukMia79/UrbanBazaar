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
                            <!-- ডাটা লোড হওয়ার পর স্লাইডার দেখাবে -->
                            <div v-if="banners.length > 0" class="main_slider owl-carousel">
                                <!-- লুপের ভেতর ফিল্টার ব্যবহার করা হয়েছে যাতে শুধু মেইন স্লাইডারের ছবি আসে -->
                                <div class="slider-item"
                                    v-for="banner in banners.filter(b => b.category && b.category.name == 'Slider (1060*395)')"
                                    :key="banner.id">
                                    <a :href="banner.link || '#'">
                                        <img :src="'/' + banner.image" alt="Banner" class="main-slider-style" />
                                    </a>
                                </div>
                            </div>
                            <!-- ডাটা না আসা পর্যন্ত একটি ডিফল্ট টেক্সট বা হাইট দিয়ে রাখুন -->
                            <div v-else style="height: 395px; background: #f0f0f0;"
                                class="rounded d-flex align-items-center justify-content-center">
                                Loading Banners...
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
                                    <div v-if="product.discount_price !== null || 0" class="sale-badge">
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
                                        <router-link :to="{ name: 'SingleProduct', params: { id: product.id } }">
                                            <img :src="'/' + product.image" :alt="product.name" />
                                        </router-link>
                                    </div>
                                    <div class="pro_des">
                                        <div class="pro_name">
                                            <router-link :to="{ name: 'SingleProduct', params: { id: product.id } }">{{
                                                product.name }}</router-link>
                                        </div>
                                    </div>
                                </div>

                                <div class="pro_price">
                                    <p v-if="product.discount_price !== null || 0">
                                        <del>৳ {{ product.price }}</del>
                                        ৳ {{ product.discount_price }}
                                    </p>
                                    <p v-else>
                                        ৳ {{ product.price }}
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

        <!-- For You Section (Static Grid) -->
        <section class="homeproduct" v-if="personalizedProducts.length > 0">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="sec_title">
                            <h3 class="section-title-header">
                                <div class="timer_inner">
                                    <span class="section-title-name">
                                        For You
                                    </span>
                                </div>
                            </h3>
                        </div>
                    </div>
                </div>

                <!-- গ্রিড লেআউট: মোবাইলে ২টা, ট্যাবে ৩টা এবং ডেসক্রিপটপে ৫টা করে দেখাবে -->
                <div class="row g-3">
                    <div v-for="personalized in personalizedProducts" :key="personalized.id"
                        class="col-6 col-sm-4 col-md-3 col-lg-custom">
                        <div class="product_item wist_item wow zoomIn" data-wow-duration="1.0s">
                            <div class="product_item_inner">
                                <!-- ডিসকাউন্ট ব্যাজ -->
                                <div class="sale-badge" v-if="personalized.discount_price">
                                    <div class="sale-badge-inner">
                                        <div class="sale-badge-box">
                                            <span class="sale-badge-text">
                                                <p>{{ calculateDiscount(personalized.price, personalized.discount_price)
                                                }}%</p>
                                                OFF
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="pro_img">
                                    <router-link :to="{ name: 'SingleProduct', params: { id: personalized.id } }">
                                        <img :src="'/' + personalized.image" :alt="personalized.name" />
                                    </router-link>
                                </div>
                                <div class="pro_des">
                                    <div class="pro_name">
                                        <router-link :to="{ name: 'SingleProduct', params: { id: personalized.id } }">
                                            {{ personalized.name.substring(0, 40) }}...
                                        </router-link>
                                    </div>
                                </div>
                            </div>

                            <div class="pro_price">
                                <p>
                                    <del v-if="personalized.discount_price">৳ {{ personalized.price }}</del>
                                    ৳ {{ personalized.discount_price ? personalized.discount_price : personalized.price
                                    }}
                                </p>
                            </div>

                            <div class="pro_btn d-flex justify-content-between align-items-center gap-2">
                                <router-link :to="{ name: 'SingleProduct', params: { id: personalized.id } }"
                                    class="btn btn-sm w-100"
                                    style="background-color: #3f0051; color: #ffffff; border: none;">
                                    Order Now
                                </router-link>
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
            </div>
        </section>

        <!-- AI Onboarding Survey Modal -->
        <div v-if="showSurveyModal" class="survey-overlay">
            <div class="survey-modal card border-0 shadow-lg p-4 animate__animated animate__fadeInUp">
                <div class="text-center">
                    <div class="modal-logo-container mb-4">
                        <img v-if="logo.white_logo" :src="'/' + logo.white_logo" alt="Site Logo" class="modal-logo" />
                        <h2 v-else class="fw-bold text-dark">UrbanBazaar</h2>
                    </div>

                    <h5 class="fw-bold text-dark text-uppercase mb-3" style="letter-spacing: 1px; font-size: 1rem;">
                        আমাদেরকে আপনার পছন্দ সম্পর্কে বলুন</h5>

                    <p class="text-muted text-center small px-3 mb-2" style="line-height: 1.6; font-size: 14px;">
                        আপনার কেনাকাটা আরও সহজ করতে ক্যাটাগরিগুলো থেকে আপনার পছন্দের অন্তত ৩টি ক্যাটাগরি সিলেক্ট করুন।
                    </p>
                </div>

                <div class="survey-grid my-3 custom-scrollbar">
                    <div v-for="cat in categories" :key="cat.id" class="survey-item"
                        :class="{ 'active': selectedCategories.includes(cat.id) }"
                        @click="toggleCategorySelection(cat.id)">
                        <img :src="'/' + cat.image" class="cat-img-survey">
                        <span class="cat-text-survey">{{ cat.name }}</span>
                        <i v-if="selectedCategories.includes(cat.id)" class="fa-solid fa-circle-check check-mark"></i>
                    </div>
                </div>

                <div class="mt-3">
                    <button @click="submitSurvey" :disabled="selectedCategories.length < 1"
                        class="btn btn-indigo w-100 rounded-pill py-2 text-white fw-bold shadow-sm">
                        {{ selectedCategories.length < 1 ? 'ক্যাটাগরি নির্বাচন করুন' : 'Save & Continue' }} </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import AppStorage from "../Helpers/AppStorage";
import Notification from "../Helpers/Notification";
export default {
    name: "HomeContent",
    data() {
        return {
            banners: [],
            categories: [],
            products: [],
            personalizedProducts: [],

            logo: { white_logo: null },
            showSurveyModal: false,
            selectedCategories: [],
        }
    },
    methods: {
        getLogo() {
            axios.get('/api/general/setting').then(res => {
                this.logo = res.data.logo || { white_logo: res.data.white_logo };
            });
        },
        // চেক করা সার্ভে পপআপ দেখানো লাগবে কি না
        checkSurveyStatus() {
            const user = AppStorage.getUser();
            const token = AppStorage.getToken();

            // যদি ইউজার লগইন থাকে এবং তার সার্ভে এখনো কমপ্লিট না হয়
            if (token && user && user.is_survey_completed === 0) {
                this.showSurveyModal = true;
            }
        },

        // সার্ভেতে ক্যাটাগরি সিলেক্ট/ডিসিলেক্ট
        toggleCategorySelection(id) {
            if (this.selectedCategories.includes(id)) {
                this.selectedCategories = this.selectedCategories.filter(i => i !== id);
            } else {
                this.selectedCategories.push(id);
            }
        },

        // সার্ভে ডাটা সাবমিট
        submitSurvey() {
            const token = AppStorage.getToken();

            axios.post('/api/user/save-survey',
                { category_ids: this.selectedCategories },
                { headers: { 'Authorization': `Bearer ${token}` } }
            )
                .then(res => {
                    this.showSurveyModal = false;

                    // LocalStorage আপডেট করা যাতে আর পপআপ না আসে
                    let user = AppStorage.getUser();
                    user.is_survey_completed = 1;
                    AppStorage.storeUser(user);

                    Notification.success("AI Profile Created! Shop is now personalized.");

                    // সার্ভে শেষ হওয়ার পর রিকমেন্ডেশন ইঞ্জিন রিফ্রেশ করা
                    this.getAIRecommendations();
                })
                .catch(err => {
                    console.error("Survey Error:", err);
                    Notification.error("Failed to save preferences.");
                });
        },

        // ব্যানার ডাটা লোড করা
        getBanner() {
            axios.get('/api/banner')
                .then((res) => {
                    this.banners = res.data.banners;
                    this.$nextTick(() => {
                        if (typeof window.$ !== "undefined") {
                            window.$(".main_slider").owlCarousel('destroy');
                            window.$(".main_slider").owlCarousel({
                                items: 1, loop: true, autoplay: true, dots: true, nav: false, smartSpeed: 1000,
                            });
                        }
                    });
                })
        },

        // এআই রিকমেন্ডেশন লোড
        getAIRecommendations() {
            axios.get('/api/personalized-recommendations')
                .then(res => {
                    this.personalizedProducts = res.data;
                }).catch(err => console.error("AI Data Fetch Error:", err));
        },

        // ট ডিল প্রোডাক্ট লোড
        getProductData() {
            axios.get('/api/product')
                .then((res) => {
                    this.products = res.data.filter(product => {
                        return product.hot_deals != null && product.hot_deals != 0;
                    });

                    this.$nextTick(() => {
                        if (typeof window.$ !== "undefined") {
                            window.$(".product_slider").owlCarousel('destroy');
                            window.$(".product_slider").owlCarousel({
                                loop: this.products.length > 4,
                                margin: 15, nav: true, dots: false, autoplay: true,
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
                                loop: true, margin: 10, nav: true, dots: true,
                                responsive: { 0: { items: 2 }, 600: { items: 4 }, 1000: { items: 8 } },
                            });
                        }
                    }, 100);
                }).catch((error) => {
                    console.log(error);
                });
        }
    },
    mounted() {
        this.getBanner();
        this.getProductData();
        this.getSidebarData();
        this.getAIRecommendations();
        this.getLogo();
        this.checkSurveyStatus();
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

@media (min-width: 1200px) {
    .col-lg-custom {
        flex: 0 0 20%;
        max-width: 20%;
    }
}

.wist_item {
    margin-bottom: 20px;
}


.survey-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.85);
    z-index: 999999;
    display: flex;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(8px);
}

.modal-logo {
    max-height: 35px;
    width: auto;
    object-fit: contain;
}

.survey-modal {
    width: 95%;
    max-width: 460px;
    border-radius: 25px;
    background: #ffffff;
    padding: 30px !important;
}

h5 {
    color: #333 !important;
}

.ai-bot-icon {
    font-size: 50px;
}

.survey-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 10px;
    max-height: 250px;
    overflow-y: auto;
    padding: 5px;
}

.survey-item {
    border: 2px solid #f0f0f0;
    border-radius: 15px;
    padding: 10px;
    text-align: center;
    cursor: pointer;
    position: relative;
    transition: 0.3s;
}

.survey-item.active {
    border-color: #4b1091;
    background: #f3e5f5;
}

.cat-img-survey {
    width: 35px;
    height: 35px;
    object-fit: cover;
    border-radius: 50%;
    margin-bottom: 5px;
}

.cat-text-survey {
    font-size: 11px;
    display: block;
    font-weight: 600;
    color: #333;
}

.check-mark {
    position: absolute;
    top: 5px;
    right: 5px;
    color: #4b1091;
    font-size: 14px;
}

.btn-indigo {
    background-color: #4b1091;
}
</style>
