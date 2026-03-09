<template>
    <div id="content">
        <div class="homeproduct main-details-page" v-if="product.id">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <section class="product-section">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6 position-relative">
                                        <div v-if="product.discount_price && product.discount_price > 0"
                                            class="product-details-discount-badge">
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
                                                            OFF
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="details_slider owl-carousel">
                                            <div class="dimage_item" v-for="img in product.multi_images" :key="img.id">
                                                <img :src="'/' + img.image_path" class="block__pic" />
                                            </div>
                                        </div>
                                        <div class="indicator_thumb">
                                            <div class="indicator-item" data-id="0" v-for="img in product.multi_images"
                                                :key="img.id">
                                                <img :src="'/' + img.image_path" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="details_right">
                                            <div class="breadcrumb">
                                                <ul>
                                                    <li>
                                                        <a href="../index.html">Home</a>
                                                    </li>
                                                    <li><span>/</span></li>
                                                    <li>
                                                        <a href="#">{{
                                                            product.category
                                                                .name
                                                        }}</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="product">
                                                <div class="product-cart">
                                                    <p class="name">
                                                        {{ product.name }}
                                                    </p>
                                                    <p v-if="product.discount_price !== null || 0"
                                                        class="details-price">
                                                        <del>৳{{
                                                            product.price
                                                        }}</del>
                                                        ৳{{
                                                            product.discount_price
                                                        }}
                                                    </p>
                                                    <p v-else class="details-price">
                                                        ৳{{
                                                            product.price
                                                        }}
                                                    </p>
                                                    <div class="details-ratting-wrapper">
                                                        <i v-for="i in 5" :key="i"
                                                            :class="i <= Math.round(product.average_rating) ? 'fas fa-star text-warning' : 'far fa-star'">
                                                        </i>
                                                        <span class="ms-2">
                                                            {{ product.average_rating ?
                                                                parseFloat(product.average_rating).toFixed(1) : '0.0' }}/5
                                                        </span>
                                                        <a class="all-reviews-button ms-3" href="#description">
                                                            ({{ product.reviews_count || 0 }} Reviews)
                                                        </a>
                                                    </div>
                                                    <div class="product-code">
                                                        <p>
                                                            <span>Product code : </span>{{
                                                                product.product_code
                                                            }}
                                                        </p>
                                                    </div>
                                                    <form name="formName">
                                                        <div class="pro-color" style="width: 100%"
                                                            v-if="product.colors && product.colors.length > 0">
                                                            <div class="color_inner">
                                                                <p class="fw-bold mb-2">Select Color/Style -</p>
                                                                <div class="size-container">
                                                                    <div class="selector d-flex flex-wrap gap-2">
                                                                        <div class="selector-item"
                                                                            v-for="(colorPath, index) in product.colors"
                                                                            :key="index">
                                                                            <input type="radio" :id="'variant-' + index"
                                                                                :value="colorPath"
                                                                                v-model="selectedColor"
                                                                                name="product_color"
                                                                                class="selector-item_radio d-none"
                                                                                required />
                                                                            <label :for="'variant-' + index"
                                                                                class="variant-img-label">
                                                                                <img :src="'/' + colorPath"
                                                                                    class="img-thumbnail variant-img" />

                                                                                <div class="selected-check"
                                                                                    v-if="selectedColor === colorPath">
                                                                                    <i class="fas fa-check-circle"></i>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="pro-size mt-3" v-if="
                                                            product.sizes &&
                                                            product.sizes
                                                                .length > 0
                                                        ">
                                                            <div class="size_inner">
                                                                <p class="fw-bold mb-2">
                                                                    Select Size
                                                                    -
                                                                </p>
                                                                <div class="d-flex flex-wrap gap-2">
                                                                    <div v-for="size in product.sizes" :key="size.id
                                                                        " class="selector-item">
                                                                        <input type="radio" :id="'size-' +
                                                                            size.id
                                                                            " :value="size.name
                                                                                " v-model="selectedSize
                                                                                    " name="product_size"
                                                                            class="selector-item_radio" />
                                                                        <label :for="'size-' +
                                                                            size.id
                                                                            "
                                                                            class="btn btn-outline-secondary btn-sm px-3 py-1 fw-bold"
                                                                            style="
                                                                                cursor: pointer;
                                                                                min-width: 45px;
                                                                            ">
                                                                            {{
                                                                                size.name
                                                                            }}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="pro_brand">
                                                            <p>
                                                                Brand :
                                                                {{
                                                                    product.brand
                                                                        ? product
                                                                            .brand
                                                                            .name
                                                                        : "N/A"
                                                                }}
                                                            </p>
                                                        </div>

                                                        <div class="row">
                                                            <div class="qty-cart col-sm-12">
                                                                <div class="quantity">
                                                                    <span class="minus" @click="
                                                                        decrementQty
                                                                    " style="
                                                                            cursor: pointer;
                                                                        ">-</span>

                                                                    <input type="text" v-model="qty
                                                                        " readonly style="
                                                                            text-align: center;
                                                                        " />

                                                                    <span class="plus" @click="
                                                                        incrementQty
                                                                    " style="
                                                                            cursor: pointer;
                                                                        ">+</span>
                                                                </div>
                                                            </div>

                                                            <div class="d-flex single_product col-sm-12 gap-2 mt-2">
                                                                <button type="button" class="btn px-4 add_cart_btn"
                                                                    @click="
                                                                        addToCart
                                                                    ">
                                                                    Add to cart
                                                                </button>

                                                                <button type="button"
                                                                    class="btn px-4 order_now_btn order_now_btn_m"
                                                                    @click="
                                                                        buyNow
                                                                    ">
                                                                    Buy Now
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="mt-md-2 mt-2">
                                                            <h4 class="font-weight-bold">
                                                                <a class="btn btn-success w-100 call_now_btn"
                                                                    href="tel: +8801746100989">
                                                                    <i class="fa fa-phone-square"></i>
                                                                    +8801790647979
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div class="mt-md-2 mt-2">
                                                            <h4 class="font-weight-bold">
                                                                <a class="btn btn-success w-100 call_now_btn"
                                                                    href="https://api.whatsapp.com/send?phone=+8801746100989&amp;text=%e0%a6%b9%e0%a7%8d%e0%a6%af%e0%a6%be%e0%a6%b2%e0%a7%8b,%20%e0%a6%86%e0%a6%ae%e0%a6%bf%20%e0%a6%8f%e0%a6%87%20%e0%a6%aa%e0%a6%a3%e0%a7%8d%e0%a6%af%e0%a6%9f%e0%a6%bf%e0%a6%b0%20%e0%a6%ac%e0%a7%8d%e0%a6%af%e0%a6%be%e0%a6%aa%e0%a6%be%e0%a6%b0%e0%a7%87%20%e0%a6%9c%e0%a6%be%e0%a6%a8%e0%a6%a4%e0%a7%87%20%e0%a6%9a%e0%a6%be%e0%a6%87:%20https%3A%2F%2Fecom.shariatpur.shop%2Fproduct%2Fartificial-leather-fashionable-hand-bag-for-women-50"
                                                                    target="_blank">
                                                                    <i class="fa fa-whatsapp"></i>
                                                                    Ask about
                                                                    this product
                                                                </a>
                                                            </h4>
                                                        </div>

                                                        <div class="mt-md-2 mt-2">
                                                            <div class="del_charge_area">
                                                                <div class="alert alert-info text-xs">
                                                                    <div class="flext_area">
                                                                        <i class="fa-solid fa-cubes"></i>
                                                                        <div>
                                                                            <span>সারা
                                                                                বাংলাদেশ
                                                                                ১৫০
                                                                                টাকা
                                                                                ডেলিভারি
                                                                                চার্জ
                                                                                <br /></span>
                                                                            <span>ঢাকার
                                                                                ভিতরে
                                                                                ৮০
                                                                                টাকা
                                                                                <br /></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>

        <div class="description-nav-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="description-nav">
                            <ul class="desc-nav-ul">
                                <li>
                                    <a href="#description" target="_self">Description</a>
                                </li>
                                <li>
                                    <a href="#writeReview" target="_self">Reviews (0)
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="pro_details_area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="description tab-content details-action-box" id="description">
                            <h2>Details</h2>
                            <div class="html-content pdp-product-highlights p-3">
                                <div v-if="product.description" v-html="product.description"
                                    class="product-description-content">
                                </div>
                                <p v-else class="text-muted">No description available for this product.</p>
                            </div>
                        </div>
                        <div class="tab-content details-action-box" id="writeReview">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="section-head">
                                            <div class="title">
                                                <h2>Reviews (0)</h2>
                                                <p>
                                                    Get specific details about
                                                    this product from customers
                                                    who own it.
                                                </p>
                                            </div>
                                            <div class="action">
                                                <div>
                                                    <button type="button"
                                                        class="details-action-btn question-btn btn-overlay"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        Write a review
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="empty-content">
                                            <i class="fa fa-clipboard-list"></i>
                                            <p class="empty-text">
                                                This product has no reviews yet.
                                                Be the first one to write a
                                                review.
                                            </p>
                                        </div>
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                            Your review
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="insert-review">
                                                            <!-- Review Form Section -->
                                                            <div class="card border-0 shadow-sm p-4 mt-5 rounded-4">
                                                                <h5 class="fw-bold mb-3">Write a Customer Review</h5>

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="mb-3">
                                                                            <label class="small fw-bold">Your Rating
                                                                                *</label>
                                                                            <select v-model="reviewForm.ratting"
                                                                                class="form-select border-0 bg-light">
                                                                                <option value="5">⭐⭐⭐⭐⭐ (5/5)</option>
                                                                                <option value="4">⭐⭐⭐⭐ (4/5)</option>
                                                                                <option value="3">⭐⭐⭐ (3/5)</option>
                                                                                <option value="2">⭐⭐ (2/5)</option>
                                                                                <option value="1">⭐ (1/5)</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="small fw-bold">Your Review
                                                                                *</label>
                                                                            <textarea v-model="reviewForm.review"
                                                                                class="form-control border-0 bg-light"
                                                                                rows="4"
                                                                                placeholder="Tell us about the product..."></textarea>
                                                                        </div>
                                                                        <button @click="submitReview"
                                                                            class="btn btn-review-submit">
                                                                            Submit Feedback
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="related-product-section">
            <div class="container">
                <div class="row">
                    <div class="related-title">
                        <h5>Related Product</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="product-inner owl-carousel related_slider" :key="product.id">
                            <div class="product_item wist_item wow zoomIn" data-wow-duration="1.5s"
                                data-wow-delay="0.0s" v-for="rel in recommendations" :key="rel.id">
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
                                        <router-link :to="{ name: 'SingleProduct', params: { id: rel.id } }">
                                            <img :src="'/' + rel.image" alt="" />
                                        </router-link>
                                    </div>
                                    <div class="pro_des">
                                        <div class="pro_name">
                                            <router-link :to="{ name: 'SingleProduct', params: { id: rel.id } }">
                                                {{ rel.name }}
                                            </router-link>
                                        </div>
                                    </div>
                                </div>

                                <div class="pro_price">
                                    <p>
                                        <del>৳ {{ rel.price }}</del>
                                        ৳ {{ rel.discount_price }}
                                    </p>
                                </div>
                                <div class="pro_btn">
                                    <div class="cart_btn order_button">
                                        <a href="trendy-fashion-bag-for-women-lady%2c-college-university-shoulder-bag-for-girls-big-size-50.html"
                                            class="addcartbutton">
                                            <span>Buy Now</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- More product items... -->
                            <!-- I'm keeping your structure, but removed repeat items for clarity in response -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import AppStorage from "../../../Helpers/AppStorage";
export default {
    data() {
        return {
            product: {},
            recommendations: [],
            id: this.$route.params.id,
            qty: 1,
            selectedColor: null,
            selectedSize: null,
            reviewForm: {
                ratting: 5,
                review: '',
                product_id: this.$route.params.id
            }
        };
    },
    methods: {
        getProductData() {
            axios
                .get(`/api/product/${this.id}`)
                .then((res) => {
                    this.product = res.data.product;
                    this.recommendations = res.data.recommendations;

                    this.initSlider();
                    this.initRelatedSlider();
                })
                .catch((err) => console.log(err));
        },
        initSlider() {
            this.$nextTick(() => {
                if (window.$ && $(".details_slider").length > 0) {
                    $(".details_slider").owlCarousel("destroy");
                    $(".details_slider").owlCarousel({
                        items: 1,
                        loop: true,
                        autoplay: true,
                        dots: true,
                        nav: false,
                    });
                }
            });
        },

        initRelatedSlider() {
            this.$nextTick(() => {
                if (window.$ && $(".related_slider").length > 0) {
                    $(".related_slider").owlCarousel("destroy");
                    $(".related_slider").owlCarousel({
                        loop: this.recommendations.length > 4,
                        margin: 15,
                        nav: true,
                        dots: false,
                        autoplay: true,
                        responsive: { 0: { items: 2 }, 600: { items: 3 }, 1000: { items: 5 } }
                    });
                }
            });
        },
        calculateDiscount(price, discountPrice) {
            if (!price || !discountPrice) return 0;
            return Math.round(((price - discountPrice) / price) * 100);
        },

        addToCart() {
            if (!AppStorage.getToken()) {
                Notification.error("Please login first to add items to cart!");
                this.$router.push({ name: "UserLogin" });
                return false;
            }

            if (this.product.colors && this.product.colors.length > 0 && !this.selectedColor) {
                Notification.error("Please select a specific style/image!");
                return false;
            }
            if (this.product.sizes && this.product.sizes.length > 0 && !this.selectedSize) {
                Notification.error("Please select a size!");
                return false;
            }


            let cartImage = this.selectedColor ? this.selectedColor : this.product.image;

            let cartData = {
                product_id: this.product.id,
                name: this.product.name,
                qty: this.qty,
                price: this.product.discount_price ? this.product.discount_price : this.product.price,
                color: this.selectedColor,
                size: this.selectedSize,
                image: cartImage,
            };

            axios.post("/api/cart", cartData)
                .then((res) => {
                    Notification.success("Added to cart successfully!");
                    window.dispatchEvent(new CustomEvent('cart-updated'));
                })
                .catch((err) => {
                    if (err.response && err.response.status === 401) {
                        AppStorage.clear();
                        this.$router.push({ name: "UserLogin" });
                    }
                    console.error("Cart storage error:", err);
                });

            return true;
        },


        buyNow() {
            let status = this.addToCart();

            if (status) {
                this.$router.push({ name: "CheckOut" });
            }
        },

        incrementQty() {
            if (this.qty < this.product.stock_quantity) {
                this.qty++;
            } else {
                alert("Stock limit reached!");
            }
        },
        decrementQty() {
            if (this.qty > 1) {
                this.qty--;
            }
        },
        submitReview() {
            if (this.reviewForm.review === '') {
                Notification.error("Please write something!");
                return;
            }

            axios.post('/api/review/store', this.reviewForm)
                .then(res => {
                    Notification.success(res.data.message);
                    this.reviewForm.review = '';
                })
                .catch(error => {
                    if (error.response.status === 401) {
                        Notification.error("Please login first!");
                    }
                });
        },
    },
    mounted() {
        this.getProductData();
        window.scrollTo(0, 0);
    },
    watch: {
        "$route.params.id": function (newId) {
            this.id = newId;
            this.product = {};
            this.selectedColor = null;
            this.selectedSize = null;
            this.qty = 1;
            this.getProductData();
            window.scrollTo(0, 0);
        },
    },
};
</script>

<style scoped>
.related-product-section .owl-carousel {
    width: 100% !important;
    overflow: hidden;
}

.related-product-section .owl-stage-outer {
    overflow: hidden;
}

.selector-item_radio:checked+label {
    background-color: #3f0051;
    color: white;
    border-color: #3f0051;
}

.btn-review-submit {
    background-color: #760478 !important;
    color: white !important;
    padding: 10px 25px;
    font-weight: bold;
    border-radius: 8px;
    border: none;
    margin-top: 15px;
    transition: 0.3s ease-in-out;
}

.btn-review-submit:hover {
    background-color: #3f0051 !important;
    box-shadow: 0 4px 12px rgba(63, 0, 81, 0.3);
    transform: translateY(-2px);
}

.form-select.bg-light,
.form-control.bg-light {
    border: 1px solid #eee !important;
}

.form-select.bg-light:focus,
.form-control.bg-light:focus {
    background-color: #fff !important;
    border-color: #3f0051 !important;
    box-shadow: none;
}

.text-warning {
    color: #ffc107 !important;
    /* Gold/Yellow color */
}

.details-ratting-wrapper i {
    font-size: 14px;
    margin-right: 2px;
}

.product-description-content {
    white-space: pre-wrap !important;
    line-height: 1.6;
    color: #444;
}

.pro-color {
    margin-bottom: 25px !important;
}

.variant-img-label {
    position: relative;
    cursor: pointer;
    display: block;
}

.variant-img {
    width: 60px !important;
    height: 60px !important;
    object-fit: cover;
    border: 2px solid #ddd;
    border-radius: 8px;
    padding: 2px;
    transition: 0.3s ease-in-out;
}

.variant-img-label:hover .variant-img {
    border-color: #3f0051;
}

.selector-item_radio:checked+.variant-img-label .variant-img {
    border-color: #3f0051;
    background-color: #f3e5f5;
}

.selected-check {
    position: absolute;
    top: -5px;
    right: -5px;
    background: white;
    border-radius: 50%;
    color: #3f0051;
    font-size: 18px;
    line-height: 1;
}
</style>
