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
                                    <img :src="`/uploads/banner/1761398991trimmer-gif`" alt=""
                                        class="main-slider-style" />
                                </div>
                                <!-- slider item -->
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
                        <div class="category-slider owl-carousel">
                            <div v-for="category in categories" :key="category.id" class="cat_item">
                                <div class="cat_img">
                                    <router-link :to="{ name: 'CategoryPage', params: {id: category.id} }" class="text-decoration-none"><img
                                            :src="'/' + category.image" alt="" /></router-link>
                                </div>
                                <div class="cat_name">
                                    <router-link class="text-decoration-none" :to="{name: 'CategoryPage', params: {id: category.id}}">
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
                            <div class="product_item wist_item wow zoomIn" data-wow-duration="1.5s"
                                data-wow-delay="0.0s">
                                <div class="product_item_inner">
                                    <div class="sale-badge">
                                        <div class="sale-badge-inner">
                                            <div class="sale-badge-box">
                                                <span class="sale-badge-text">
                                                    <p>54%</p>
                                                    OFF
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro_img">
                                        <a href="product/laravel-v6-ecommerce-65.html">
                                            <img :src="`/uploads/product/1763188141-ready-to-grow-%e2%80%93-your-e-commerce-journey-starts-here-(2).png`"
                                                alt="Laravel v6 Ecommerce" />
                                        </a>
                                    </div>
                                    <div class="pro_des">
                                        <div class="pro_name">
                                            <a href="product/laravel-v6-ecommerce-65.html">Laravel v6 Ecommerce</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="pro_price">
                                    <p>
                                        <del>৳ 1200</del>
                                        ৳ 550
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
                            <div class="product_item wist_item wow zoomIn" data-wow-duration="1.5s"
                                data-wow-delay="0.1s">
                                <div class="product_item_inner">
                                    <div class="sale-badge">
                                        <div class="sale-badge-inner">
                                            <div class="sale-badge-box">
                                                <span class="sale-badge-text">
                                                    <p>79%</p>
                                                    OFF
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro_img">
                                        <a href="product/skin-cafe-soft-lips-lip-balm-smoothie-55.html">
                                            <img :src="`/uploads/product / 1761419033 - 1 - (1).png`"
                                                alt="Skin Cafe Soft Lips Lip Balm-Smoothie" />
                                        </a>
                                    </div>
                                    <div class="pro_des">
                                        <div class="pro_name">
                                            <a href="product/skin-cafe-soft-lips-lip-balm-smoothie-55.html">Skin Cafe
                                                Soft Lips Lip
                                                Balm-Smooth...</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="pro_price">
                                    <p>
                                        <del>৳ 1200</del>
                                        ৳ 250
                                    </p>
                                </div>
                                <div class="pro_btn d-flex justify-content-between align-items-center gap-2">
                                    <!-- Order Now বাটন -->
                                    <a class="btn btn-sm w-100 addcartbutton" data-id="55" data-checkout="yes" style="
                                            flex: 1;
                                            background-color: #3f0051;
                                            color: #ffffff;
                                            border: none;
                                        ">
                                        Order Now
                                    </a>

                                    <!-- কার্ট আইকন বাটন -->
                                    <a class="btn btn-sm addcartbutton" data-id="55" style="
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
                            <div class="product_item wist_item wow zoomIn" data-wow-duration="1.5s"
                                data-wow-delay="0.2s">
                                <div class="product_item_inner">
                                    <div class="sale-badge">
                                        <div class="sale-badge-inner">
                                            <div class="sale-badge-box">
                                                <span class="sale-badge-text">
                                                    <p>35%</p>
                                                    OFF
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro_img">
                                        <a href="product/etude-house-dear-darling-water-tint-53.html">
                                            <img :src="`/uploads/product/1761418772-imgi_59_etude-house-dear-darling-water-tint-02-cherry-ade.jpg`"
                                                alt="ETUDE HOUSE DEAR DARLING WATER TINT" />
                                        </a>
                                    </div>
                                    <div class="pro_des">
                                        <div class="pro_name">
                                            <a href="product/etude-house-dear-darling-water-tint-53.html">ETUDE HOUSE
                                                DEAR DARLING WATER
                                                TINT</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="pro_price">
                                    <p>
                                        <del>৳ 1000</del>
                                        ৳ 650
                                    </p>
                                </div>
                                <div class="pro_btn d-flex justify-content-between align-items-center gap-2">
                                    <!-- Order Now বাটন -->
                                    <a class="btn btn-sm w-100 addcartbutton" data-id="52" data-checkout="yes" style="
                                            flex: 1;
                                            background-color: #3f0051;
                                            color: #ffffff;
                                            border: none;
                                        ">
                                        Order Now
                                    </a>

                                    <!-- কার্ট আইকন বাটন -->
                                    <a class="btn btn-sm addcartbutton" data-id="52" style="
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
                            <div class="product_item wist_item wow zoomIn" data-wow-duration="1.5s"
                                data-wow-delay="0.3s">
                                <div class="product_item_inner">
                                    <div class="sale-badge">
                                        <div class="sale-badge-inner">
                                            <div class="sale-badge-box">
                                                <span class="sale-badge-text">
                                                    <p>54%</p>
                                                    OFF
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro_img">
                                        <router-link :to="{ name: 'SingleProduct' }"><img
                                                :src="`/uploads/product/1752694416-f387e425a57f82ea9ef96c6264269b2c.jpg`"
                                                alt="Elegant design premium quality georgette fabric tops pant cord set for women //western dresses for women" /></router-link>
                                    </div>
                                    <div class="pro_des">
                                        <div class="pro_name">
                                            <router-link :to="{ name: 'SingleProduct' }">Elegant design premium quality
                                                geor...</router-link>
                                        </div>
                                    </div>
                                </div>

                                <div class="pro_price">
                                    <p>
                                        <del>৳ 1200</del>
                                        ৳ 550
                                    </p>
                                </div>
                                <div class="pro_btn d-flex justify-content-between align-items-center gap-2">
                                    <a href="product/elegant-design-premium-quality-georgette-fabric-tops-pant-cord-set-for-women-western-dresses-for-women-49.html"
                                        class="btn btn-sm w-100" style="
                                            flex: 1;
                                            background-color: #3f0051;
                                            color: #ffffff;
                                            border: none;
                                        ">
                                        Order Now
                                    </a>

                                    <a href="javascript:void(0)" class="btn btn-sm add-to-cart-btn" data-id="49" style="
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
                            <div class="product_item wist_item wow zoomIn" data-wow-duration="1.5s"
                                data-wow-delay="0.4s">
                                <div class="product_item_inner">
                                    <div class="sale-badge">
                                        <div class="sale-badge-inner">
                                            <div class="sale-badge-box">
                                                <span class="sale-badge-text">
                                                    <p>42%</p>
                                                    OFF
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro_img">
                                        <a href="product/gulabari-premium-rose-water---120ml-46.html">
                                            <img :src="`/uploads/product/1752690246-photo_2025-07-17_00-15-07.jpg`"
                                                alt="Gulabari Premium Rose Water - 120ml" />
                                        </a>
                                    </div>
                                    <div class="pro_des">
                                        <div class="pro_name">
                                            <a href="product/gulabari-premium-rose-water---120ml-46.html">Gulabari
                                                Premium Rose Water -
                                                120ml</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="pro_price">
                                    <p>
                                        <del>৳ 120</del>
                                        ৳ 70
                                    </p>
                                </div>
                                <div class="pro_btn d-flex justify-content-between align-items-center gap-2">
                                    <!-- Order Now বাটন -->
                                    <a class="btn btn-sm w-100 addcartbutton" data-id="45" data-checkout="yes" style="
                                            flex: 1;
                                            background-color: #3f0051;
                                            color: #ffffff;
                                            border: none;
                                        ">
                                        Order Now
                                    </a>

                                    <!-- কার্ট আইকন বাটন -->
                                    <a class="btn btn-sm addcartbutton" data-id="45" style="
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
                            <div class="product_item wist_item wow zoomIn" data-wow-duration="1.5s"
                                data-wow-delay="0.5s">
                                <div class="product_item_inner">
                                    <div class="sale-badge">
                                        <div class="sale-badge-inner">
                                            <div class="sale-badge-box">
                                                <span class="sale-badge-text">
                                                    <p>54%</p>
                                                    OFF
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro_img">
                                        <a
                                            href="product/large-capacity-waterproof-anti-theft-ladies-bag---blue%2c-black%2c-purple%2c-red-50.html">
                                            <img :src="`/uploads/product/1752694781-95668875cc528cdf429e3bd117cedc2c.jpg`"
                                                alt="Large Capacity Waterproof Anti-Theft Ladies Bag - Blue, Black, Purple, Red" />
                                        </a>
                                    </div>
                                    <div class="pro_des">
                                        <div class="pro_name">
                                            <a
                                                href="product/large-capacity-waterproof-anti-theft-ladies-bag---blue%2c-black%2c-purple%2c-red-50.html">Large
                                                Capacity Waterproof
                                                Anti-Thef...</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="pro_price">
                                    <p>
                                        <del>৳ 1200</del>
                                        ৳ 550
                                    </p>
                                </div>
                                <div class="pro_btn d-flex justify-content-between align-items-center gap-2">
                                    <!-- Order Now বাটন -->
                                    <a class="btn btn-sm w-100 addcartbutton" data-id="37" data-checkout="yes" style="
                                            flex: 1;
                                            background-color: #3f0051;
                                            color: #ffffff;
                                            border: none;
                                        ">
                                        Order Now
                                    </a>

                                    <!-- কার্ট আইকন বাটন -->
                                    <a class="btn btn-sm addcartbutton" data-id="37" style="
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
                            <div class="product_item wist_item wow zoomIn" data-wow-duration="1.5s"
                                data-wow-delay="0.6s">
                                <div class="product_item_inner">
                                    <div class="sale-badge">
                                        <div class="sale-badge-inner">
                                            <div class="sale-badge-box">
                                                <span class="sale-badge-text">
                                                    <p>20%</p>
                                                    OFF
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro_img">
                                        <a
                                            href="product/trendy-fashion-bag-for-women-lady%2c-college-university-shoulder-bag-for-girls-big-size-50.html">
                                            <img :src="`/uploads/product/1752695357-sc93040218a074a80ae66a698eb988e81h.jpg`"
                                                alt="Trendy Fashion Bag for Women / Lady, College / University Shoulder Bag For Girls Big Size" />
                                        </a>
                                    </div>
                                    <div class="pro_des">
                                        <div class="pro_name">
                                            <a
                                                href="product/trendy-fashion-bag-for-women-lady%2c-college-university-shoulder-bag-for-girls-big-size-50.html">Trendy
                                                Fashion Bag for Women /
                                                Lady...</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="pro_price">
                                    <p>
                                        <del>৳ 500</del>
                                        ৳ 400
                                    </p>
                                </div>
                                <div class="pro_btn d-flex justify-content-between align-items-center gap-2">
                                    <a href="product/trendy-fashion-bag-for-women-lady%2c-college-university-shoulder-bag-for-girls-big-size-50.html"
                                        class="btn btn-sm w-100" style="
                                            flex: 1;
                                            background-color: #3f0051;
                                            color: #ffffff;
                                            border: none;
                                        ">
                                        Order Now
                                    </a>

                                    <a href="javascript:void(0)" class="btn btn-sm add-to-cart-btn" data-id="32" style="
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
                            <div class="product_item wist_item wow zoomIn" data-wow-duration="1.5s"
                                data-wow-delay="0.7s">
                                <div class="product_item_inner">
                                    <div class="sale-badge">
                                        <div class="sale-badge-inner">
                                            <div class="sale-badge-box">
                                                <span class="sale-badge-text">
                                                    <p>92%</p>
                                                    OFF
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro_img">
                                        <a
                                            href="product/%e0%a6%aa%e0%a7%8d%e0%a6%b0%e0%a6%bf%e0%a6%ae%e0%a6%bf%e0%a7%9f%e0%a6%be%e0%a6%ae-%e0%a6%ad%e0%a7%87%e0%a6%b2%e0%a6%ad%e0%a7%87%e0%a6%9f-%e0%a6%95%e0%a7%81%e0%a6%b6%e0%a6%a8-%e0%a6%95%e0%a6%ad%e0%a6%be%e0%a6%b0-_-plw-620-63.html">
                                            <img :src="`/uploads/product/1750751063-photo_2025-06-24_13-41-52.jpg`"
                                                alt="প্রিমিয়াম ভেলভেট কুশন কভার | PLW-620" />
                                        </a>
                                    </div>
                                    <div class="pro_des">
                                        <div class="pro_name">
                                            <a
                                                href="product/%e0%a6%aa%e0%a7%8d%e0%a6%b0%e0%a6%bf%e0%a6%ae%e0%a6%bf%e0%a7%9f%e0%a6%be%e0%a6%ae-%e0%a6%ad%e0%a7%87%e0%a6%b2%e0%a6%ad%e0%a7%87%e0%a6%9f-%e0%a6%95%e0%a7%81%e0%a6%b6%e0%a6%a8-%e0%a6%95%e0%a6%ad%e0%a6%be%e0%a6%b0-_-plw-620-63.html">প্রিমিয়াম
                                                ভেলভেট কুশন কভার |
                                                PLW-62...</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="pro_price">
                                    <p>
                                        <del>৳ 3000</del>
                                        ৳ 250
                                    </p>
                                </div>
                                <div class="pro_btn d-flex justify-content-between align-items-center gap-2">
                                    <a href="product/%e0%a6%aa%e0%a7%8d%e0%a6%b0%e0%a6%bf%e0%a6%ae%e0%a6%bf%e0%a7%9f%e0%a6%be%e0%a6%ae-%e0%a6%ad%e0%a7%87%e0%a6%b2%e0%a6%ad%e0%a7%87%e0%a6%9f-%e0%a6%95%e0%a7%81%e0%a6%b6%e0%a6%a8-%e0%a6%95%e0%a6%ad%e0%a6%be%e0%a6%b0-_-plw-620-63.html"
                                        class="btn btn-sm w-100" style="
                                            flex: 1;
                                            background-color: #3f0051;
                                            color: #ffffff;
                                            border: none;
                                        ">
                                        Order Now
                                    </a>

                                    <a href="javascript:void(0)" class="btn btn-sm add-to-cart-btn" data-id="26" style="
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
export default {
    name: "HomeContent",
    data() {
        return {
            categories: [],
        }
    },
    methods: {
        getSidebarData() {
            axios.get('/api/category')
                .then((res) => {
                    this.categories = res.data;
                }).catch((error) => {
                    console.log(error);
                });
        }
    },
    mounted() {
        this.getSidebarData();

        setTimeout(() => {
            if (typeof window.$ !== "undefined") {
                // Main slider
                window.$(".main_slider").owlCarousel({
                    items: 1,
                    loop: true,
                    autoplay: true,
                    dots: true,
                    nav: false,
                    autoplayTimeout: 5000,
                });

                // Catagory slider
                window.$(".category-slider").owlCarousel({
                    loop: true,
                    margin: 10,
                    nav: true,
                    dots: false,
                    responsive: {
                        0: { items: 2 },
                        600: { items: 4 },
                        1000: { items: 8 },
                    },
                });

                // Product slider
                window.$(".product_slider").owlCarousel({
                    loop: true,
                    margin: 15,
                    nav: true,
                    dots: false,
                    autoplay: true,
                    responsive: {
                        0: { items: 2 },
                        600: { items: 3 },
                        1000: { items: 5 },
                    },
                });
            } else {
                console.error("Can not find jQuery, check index.blade.php");
            }
        }, 500);
    },
};
</script>

<style scoped>
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
