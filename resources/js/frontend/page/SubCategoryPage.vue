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
                                <a href="../index.html">Home</a>
                                <span>/</span>
                                <strong>{{ subcategory.name }}</strong>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="showing-data">
                                        <span>Showing 1-6 of 6 Results</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="filter_sort">
                                        <div class="filter_btn">
                                            <i class="fa fa-list-ul"></i>
                                        </div>
                                        <div class="page-sort">
                                            <form action="#" class="sort-form">
                                                <select
                                                    name="sort"
                                                    class="form-control form-select sort"
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
                    <div class="col-sm-3 filter_sidebar">
                        <div class="filter_close">
                            <i class="fa fa-long-arrow-left"></i> Filter
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
                                                {{ subcategory.name }}
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
                                                        v-for="sub in subcategories"
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
                                class="product_item wist_item wow zoomIn"
                                data-wow-duration="1.5s"
                                data-wow-delay="0.0s"
                            >
                                <div class="product_item_inner">
                                    <div class="sale-badge">
                                        <div class="sale-badge-inner">
                                            <div class="sale-badge-box">
                                                <span class="sale-badge-text">
                                                    <p>54%</p>
                                                    ছাড়
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro_img">
                                        <a
                                            href="../product/large-capacity-waterproof-anti-theft-ladies-bag---blue%2c-black%2c-purple%2c-red-50.html"
                                        >
                                            <img
                                                :src="`/uploads/product/1752694781-95668875cc528cdf429e3bd117cedc2c.jpg`"
                                                alt="Large Capacity Waterproof Anti-Theft Ladies Bag - Blue, Black, Purple, Red"
                                            />
                                        </a>
                                    </div>
                                    <div class="pro_des">
                                        <div class="pro_name">
                                            <a
                                                href="../product/large-capacity-waterproof-anti-theft-ladies-bag---blue%2c-black%2c-purple%2c-red-50.html"
                                                >Large Capacity Waterproof
                                                Anti-Thef...</a
                                            >
                                        </div>
                                    </div>
                                </div>

                                <div class="pro_price">
                                    <p>
                                        <del>৳ 1200</del>
                                        ৳ 550
                                    </p>
                                </div>
                                <div
                                    class="pro_btn d-flex justify-content-between align-items-center gap-2"
                                >
                                    <!-- Buy Now বাটন -->
                                    <a
                                        class="btn btn-sm w-100 addcartbutton"
                                        data-id="37"
                                        data-checkout="yes"
                                        style="
                                            flex: 1;
                                            background-color: #3f0051;
                                            color: #ffffff;
                                            border: none;
                                        "
                                    >
                                        Buy Now
                                    </a>

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
                            <div
                                class="product_item wist_item wow zoomIn"
                                data-wow-duration="1.5s"
                                data-wow-delay="0.1s"
                            >
                                <div class="product_item_inner">
                                    <div class="sale-badge">
                                        <div class="sale-badge-inner">
                                            <div class="sale-badge-box">
                                                <span class="sale-badge-text">
                                                    <p>42%</p>
                                                    ছাড়
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro_img">
                                        <a
                                            href="../product/nylon-shoulder-backpacks-bags-new-designer-backpacks-for-women-schoolbag-for-female-fashion-business-travelling-bag-50.html"
                                        >
                                            <img
                                                :src="`/uploads/product/1752694886-9637e9b5169108f9db680281f3f83d90.jpg`"
                                                alt="Nylon Shoulder Backpacks Bags new Designer Backpacks For Women Schoolbag For Female Fashion Business Travelling Bag"
                                            />
                                        </a>
                                    </div>
                                    <div class="pro_des">
                                        <div class="pro_name">
                                            <a
                                                href="../product/nylon-shoulder-backpacks-bags-new-designer-backpacks-for-women-schoolbag-for-female-fashion-business-travelling-bag-50.html"
                                                >Nylon Shoulder Backpacks Bags
                                                new D...</a
                                            >
                                        </div>
                                    </div>
                                </div>

                                <div class="pro_price">
                                    <p>
                                        <del>৳ 1200</del>
                                        ৳ 700
                                    </p>
                                </div>
                                <div
                                    class="pro_btn d-flex justify-content-between align-items-center gap-2"
                                >
                                    <!-- Buy Now বাটন -->
                                    <a
                                        class="btn btn-sm w-100 addcartbutton"
                                        data-id="36"
                                        data-checkout="yes"
                                        style="
                                            flex: 1;
                                            background-color: #3f0051;
                                            color: #ffffff;
                                            border: none;
                                        "
                                    >
                                        Buy Now
                                    </a>

                                    <!-- কার্ট আইকন বাটন -->
                                    <a
                                        class="btn btn-sm addcartbutton"
                                        data-id="36"
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
                            <div
                                class="product_item wist_item wow zoomIn"
                                data-wow-duration="1.5s"
                                data-wow-delay="0.2s"
                            >
                                <div class="product_item_inner">
                                    <div class="sale-badge">
                                        <div class="sale-badge-inner">
                                            <div class="sale-badge-box">
                                                <span class="sale-badge-text">
                                                    <p>40%</p>
                                                    ছাড়
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro_img">
                                        <a
                                            href="../product/disney-2024-latest-trend-pu-leather-stylish-fashionable-bag-for-women-and-girls_-back-pack-50.html"
                                        >
                                            <img
                                                :src="`/uploads/product/1752694964-s3a2076c5cd794cd490ae6411f16fd10ch.jpg`"
                                                alt="Disney 2024 Latest Trend Pu Leather Stylish Fashionable Bag for Women and Girls| Back pack"
                                            />
                                        </a>
                                    </div>
                                    <div class="pro_des">
                                        <div class="pro_name">
                                            <a
                                                href="../product/disney-2024-latest-trend-pu-leather-stylish-fashionable-bag-for-women-and-girls_-back-pack-50.html"
                                                >Disney 2024 Latest Trend Pu
                                                Leather...</a
                                            >
                                        </div>
                                    </div>
                                </div>

                                <div class="pro_price">
                                    <p>
                                        <del>৳ 250</del>
                                        ৳ 150
                                    </p>
                                </div>
                                <div
                                    class="pro_btn d-flex justify-content-between align-items-center gap-2"
                                >
                                    <a
                                        href="../product/disney-2024-latest-trend-pu-leather-stylish-fashionable-bag-for-women-and-girls_-back-pack-50.html"
                                        class="btn btn-sm w-100"
                                        style="
                                            flex: 1;
                                            background-color: #3f0051;
                                            color: #ffffff;
                                            border: none;
                                        "
                                    >
                                        Buy Now
                                    </a>

                                    <a
                                        href="javascript:void(0)"
                                        class="btn btn-sm add-to-cart-btn"
                                        data-id="35"
                                        style="
                                            width: 40px;
                                            padding: 4px;
                                            background-color: transparent;
                                            color: #173495;
                                            border: 1px solid #3f0051;
                                        "
                                    >
                                        <i class="fas fa-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                            <div
                                class="product_item wist_item wow zoomIn"
                                data-wow-duration="1.5s"
                                data-wow-delay="0.3s"
                            >
                                <div class="product_item_inner">
                                    <div class="sale-badge">
                                        <div class="sale-badge-inner">
                                            <div class="sale-badge-box">
                                                <span class="sale-badge-text">
                                                    <p>43%</p>
                                                    ছাড়
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro_img">
                                        <a
                                            href="../product/artificial-leather-fashionable-hand-bag-for-women-50.html"
                                        >
                                            <img
                                                :src="`/uploads/product/1752695091-sa9c3ad54900d4ba7a8ee4569c96091a8y.jpg`"
                                                alt="Artificial Leather Fashionable hand Bag for Women"
                                            />
                                        </a>
                                    </div>
                                    <div class="pro_des">
                                        <div class="pro_name">
                                            <a
                                                href="../product/artificial-leather-fashionable-hand-bag-for-women-50.html"
                                                >Artificial Leather Fashionable
                                                hand...</a
                                            >
                                        </div>
                                    </div>
                                </div>

                                <div class="pro_price">
                                    <p>
                                        <del>৳ 700</del>
                                        ৳ 400
                                    </p>
                                </div>
                                <div
                                    class="pro_btn d-flex justify-content-between align-items-center gap-2"
                                >
                                    <a
                                        href="../product/artificial-leather-fashionable-hand-bag-for-women-50.html"
                                        class="btn btn-sm w-100"
                                        style="
                                            flex: 1;
                                            background-color: #3f0051;
                                            color: #ffffff;
                                            border: none;
                                        "
                                    >
                                        Buy Now
                                    </a>

                                    <a
                                        href="javascript:void(0)"
                                        class="btn btn-sm add-to-cart-btn"
                                        data-id="34"
                                        style="
                                            width: 40px;
                                            padding: 4px;
                                            background-color: transparent;
                                            color: #173495;
                                            border: 1px solid #3f0051;
                                        "
                                    >
                                        <i class="fas fa-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                            <div
                                class="product_item wist_item wow zoomIn"
                                data-wow-duration="1.5s"
                                data-wow-delay="0.4s"
                            >
                                <div class="product_item_inner">
                                    <div class="sale-badge">
                                        <div class="sale-badge-inner">
                                            <div class="sale-badge-box">
                                                <span class="sale-badge-text">
                                                    <p>18%</p>
                                                    ছাড়
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro_img">
                                        <a
                                            href="../product/women%27s-oxford-cloth-diagonal-cross-ethnic-style-backpacks-multi-purpose-bag-casual-portable-small-girls-fashion-holder-backpack-50.html"
                                        >
                                            <img
                                                :src="`/uploads/product/1752695218-78a61cb7184d092c4779be4455b96548.jpg`"
                                                alt="Women&#039;s Oxford Cloth Diagonal Cross Ethnic Style Backpacks Multi-purpose Bag Casual Portable Small Girls Fashion Holder Backpack"
                                            />
                                        </a>
                                    </div>
                                    <div class="pro_des">
                                        <div class="pro_name">
                                            <a
                                                href="../product/women%27s-oxford-cloth-diagonal-cross-ethnic-style-backpacks-multi-purpose-bag-casual-portable-small-girls-fashion-holder-backpack-50.html"
                                                >Women&#039;s Oxford Cloth
                                                Diagonal Cross...</a
                                            >
                                        </div>
                                    </div>
                                </div>

                                <div class="pro_price">
                                    <p>
                                        <del>৳ 850</del>
                                        ৳ 700
                                    </p>
                                </div>
                                <div
                                    class="pro_btn d-flex justify-content-between align-items-center gap-2"
                                >
                                    <!-- Buy Now বাটন -->
                                    <a
                                        class="btn btn-sm w-100 addcartbutton"
                                        data-id="33"
                                        data-checkout="yes"
                                        style="
                                            flex: 1;
                                            background-color: #3f0051;
                                            color: #ffffff;
                                            border: none;
                                        "
                                    >
                                        Buy Now
                                    </a>

                                    <!-- কার্ট আইকন বাটন -->
                                    <a
                                        class="btn btn-sm addcartbutton"
                                        data-id="33"
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
                            <div
                                class="product_item wist_item wow zoomIn"
                                data-wow-duration="1.5s"
                                data-wow-delay="0.5s"
                            >
                                <div class="product_item_inner">
                                    <div class="sale-badge">
                                        <div class="sale-badge-inner">
                                            <div class="sale-badge-box">
                                                <span class="sale-badge-text">
                                                    <p>20%</p>
                                                    ছাড়
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro_img">
                                        <a
                                            href="../product/trendy-fashion-bag-for-women-lady%2c-college-university-shoulder-bag-for-girls-big-size-50.html"
                                        >
                                            <img
                                                :src="`/uploads/product/1752695357-sc93040218a074a80ae66a698eb988e81h.jpg`"
                                                alt="Trendy Fashion Bag for Women / Lady, College / University Shoulder Bag For Girls Big Size"
                                            />
                                        </a>
                                    </div>
                                    <div class="pro_des">
                                        <div class="pro_name">
                                            <a
                                                href="../product/trendy-fashion-bag-for-women-lady%2c-college-university-shoulder-bag-for-girls-big-size-50.html"
                                                >Trendy Fashion Bag for Women /
                                                Lady...</a
                                            >
                                        </div>
                                    </div>
                                </div>

                                <div class="pro_price">
                                    <p>
                                        <del>৳ 500</del>
                                        ৳ 400
                                    </p>
                                </div>
                                <div
                                    class="pro_btn d-flex justify-content-between align-items-center gap-2"
                                >
                                    <a
                                        href="../product/trendy-fashion-bag-for-women-lady%2c-college-university-shoulder-bag-for-girls-big-size-50.html"
                                        class="btn btn-sm w-100"
                                        style="
                                            flex: 1;
                                            background-color: #3f0051;
                                            color: #ffffff;
                                            border: none;
                                        "
                                    >
                                        Buy Now
                                    </a>

                                    <a
                                        href="javascript:void(0)"
                                        class="btn btn-sm add-to-cart-btn"
                                        data-id="32"
                                        style="
                                            width: 40px;
                                            padding: 4px;
                                            background-color: transparent;
                                            color: #173495;
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
export default {
    data() {
        return {
            subcategory: {}, // এখানে subcategory (একবচন) হবে
            id: this.$route.params.id,
        }
    },
    created() {
        this.getSubCategoryData();
    },
    methods: {
        getSubCategoryData() {
            // ভুল করে /api/category লিখবেন না, কারণ এটি সাব-ক্যাটাগরি পেজ
            axios.get(`/api/subcategory/${this.id}`)
                .then((res) => {
                    this.subcategory = res.data;
                }).catch((error) => {
                    console.error("Error:", error);
                });
        }
    },
    watch: {
        '$route.params.id'(newId) {
            this.id = newId;
            this.getSubCategoryData();
        }
    }
};
</script>
<style lang="css"></style>
