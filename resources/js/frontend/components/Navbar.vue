<template>
    <div class="mobile-menu" :class="{ 'menu-active': isMenuOpen }">
        <div class="mobile-menu-logo">
            <div class="logo-image">
                <img :src="`/uploads/category/1761399037-woman-bag.webp`" alt="" class="side_cat_img" />
            </div>
            <div class="mobile-menu-close" @click="isMenuOpen = false">
                <i class="fa fa-times"></i>
            </div>
        </div>
        <ul class="first-nav">
            <li v-for="category in categories" :key="category.id" class="parent-category"
                @click="toggleCategory(category.id)">
                <router-link v-if="category.id" class="menu-category-name">
                    <img :src="'/' + category.image" alt="" class="side_cat_img" />
                    {{ category.name }}
                </router-link>
                <span class="menu-category-toggle">
                    <i v-if="category.subcategories && category.subcategories.length > 0" class="fa"
                        :class="openCategory === category.id ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                </span>
                <ul v-if="category.subcategories && category.subcategories.length > 0" class="second-nav"
                    v-show="openCategory === category.id">
                    <li v-for="sub in category.subcategories" :key="sub.id" class="parent-subcategory">
                        <router-link v-if="sub.id" :to="{ name: 'CategoryPage', params: { id: sub.id } }"
                            class="menu-subcategory-name">{{
                                sub.name }}</router-link>
                        <ul class="third-nav" style="display: none"></ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="menu-overlay" v-if="isMenuOpen" @click="isMenuOpen = false"></div>
    <header id="navbar_top">
        <div class="mobile-header sticky">
            <div class="mobile-logo">
                <div class="menu-bar">
                    <a class="toggle" @click.prevent="isMenuOpen = true">
                        <i class="fa-solid fa-bars"></i>
                    </a>
                </div>
                <div class="menu-logo">
                    <router-link :to="{ name: 'index' }"><img :src="`/uploads/settings/1761407468-jnsshopbd-(1).webp`"
                            alt="" /></router-link>
                </div>
                <div class="menu-bag">
                    <p class="margin-shopping">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="mobilecart-qty">0</span>
                    </p>
                </div>
            </div>
        </div>

        <div class="mobile-search">
            <form action="https://ecom.shariatpur.shop/search">
                <input type="text" placeholder="Search Product ... " value="" class="msearch_keyword msearch_click"
                    name="keyword" />
                <button><i class="fa fa-search"></i></button>
            </form>
            <div class="search_result"></div>
        </div>

        <div class="main-header">
            <!-- header to end -->
            <div class="logo-area">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="logo-header">
                                <div class="main-logo">
                                    <router-link :to="{ name: 'index' }"><img
                                            :src="`/uploads/settings/1761407468-jnsshopbd-(1).webp`"
                                            alt="" /></router-link>
                                </div>
                                <div class="main-search">
                                    <form action="#">
                                        <input type="text" placeholder="Search Product..."
                                            class="search_keyword search_click" name="keyword" />
                                        <button>
                                            <i class="fa fa-search text-white"></i>
                                        </button>
                                    </form>
                                    <div class="search_result"></div>
                                </div>
                                <div class="header-list-items">
                                    <ul class="mb-0">
                                        <li class="track_btn">
                                            <router-link :to="{ name: 'OrderTrack' }"
                                                class="text-black text-decoration-none"><i class="fa fa-truck"></i>Track
                                                Order</router-link>
                                        </li>

                                        <li class="cart-dialog" id="cart-qty">
                                            <a href="#">
                                                <p class="margin-shopping">
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                    <span>{{ cartQtyCount }}</span>
                                                </p>
                                            </a>
                                            <div class="cshort-summary">
                                                <ul v-for="item in cartItems" :key="item.id">
                                                    <li>
                                                        <a href="#"><img :src="'/' + item.product.image" alt="" /></a>
                                                    </li>
                                                    <li><a href="#">{{ item.product.name.substring(0, 20) }}...</a></li>
                                                    <li>Qty: {{ item.qty }}</li>
                                                    <li>
                                                        <p>৳{{ item.price }}</p>
                                                        <button @click.prevent="removeCartItem(item.id)"
                                                            class="remove-cart cart_remove"
                                                            data-id="6ff56841fef028e732b292abe4be602b"><i
                                                                class="fa-solid fa-xmark"></i></button>
                                                    </li>
                                                </ul>
                                                <p><strong>Total : ৳{{ cartTotal }}</strong></p>
                                                <router-link :to="{ name: 'CheckOut' }" class="go_cart"> Buy Now
                                                </router-link>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="catagory_menu">
                                <ul class="heder__category mb-0">
                                    <div>
                                        <li class="all__category__list" :class="{ 'disable-hover': isHomePage }">
                                            <a href="#">TOP CATEGORIES
                                                <i class="fa-solid fa-list"></i>
                                            </a>
                                            <div class="sidebar-menu side__bar">
                                                <ul class="hideshow">
                                                    <li v-for="category in categories" :key="category.id">
                                                        <router-link v-if="category.id" :to="{
                                                            name: 'CategoryPage', params: { id: category.id }
                                                        }"><img :src="'/' + category.image" alt="" />{{ category.name
                                                        }}<i v-if="category.subcategories && category.subcategories.length > 0"
                                                                class="fa-solid fa-chevron-right"></i></router-link>
                                                        <ul class="sidebar-submenu"
                                                            v-if="category.subcategories && category.subcategories.length > 0">
                                                            <li v-for="sub in category.subcategories" :key="sub.id">
                                                                <router-link v-if="sub.id"
                                                                    :to="{ name: 'CategoryPage', params: { id: sub.id } }">
                                                                    {{ sub.name }}
                                                                    <i class="fa-solid fa-chevron-right"></i>
                                                                </router-link>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </div>

                                    <div>
                                        <li>
                                            <router-link :to="{ name: 'index' }">Home</router-link>
                                        </li>
                                    </div>
                                    <div>
                                        <li>
                                            <router-link :to="{ name: 'HotDeal' }">Offers</router-link>
                                        </li>
                                    </div>

                                    <div class="contact__menu">
                                        <li>
                                            <router-link :to="{ name: 'Contact' }">Contact</router-link>
                                        </li>
                                    </div>
                                    <div class="right__menu__top">
                                        <li class="for_order">
                                            <p>
                                            <div v-if="!isLoggedIn">
                                                <router-link :to="{
                                                    name: 'UserLogin',
                                                }">
                                                    <i class="fa-regular fa-user me-2"></i>Login
                                                </router-link>
                                            </div>

                                            <div class="login_logout-nv" v-else>
                                                <a @click.prevent="logout">
                                                    <i class="fa-solid fa-right-from-bracket me-2"></i>Logout
                                                </a>
                                            </div>
                                            </p>
                                        </li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main-header end -->
    </header>

    <div class="footer_nav">
        <ul>
            <li>
                <a class="toggle col" @click="isMenuOpen = true">
                    <span>
                        <i class="fa-solid fa-bars"></i>
                    </span>
                    <span>Category</span>
                </a>
            </li>

            <li>
                <a class="col" href="https://api.whatsapp.com/send?phone=+8801790647979&amp;text=Hello">
                    <span>
                        <i class="fa-brands fa-whatsapp"></i>
                    </span>
                    <span>Message</span>
                </a>
            </li>

            <li class="mobile_home">
                <router-link :to="{ name: 'index' }">
                    <span><i class="fa-solid fa-home"></i></span>
                    <span>Home</span>
                </router-link>
            </li>

            <li>
                <router-link class="col" :to="{ name: 'CheckOut' }">
                    <span>
                        <i class="fa-solid fa-cart-shopping"></i>
                    </span>
                    <span>Cart (<b class="mobilecart-qty">0</b>)</span>
                </router-link>
            </li>
            <li class="login_logout">
                <router-link v-if="!isLoggedIn" class="col" :to="{ name: 'UserLogin' }">
                    <span>
                        <i class="fa-solid fa-user"></i>
                    </span>
                    <span>Login</span>
                </router-link>
                <a v-else class="col" @click.prevent="logout">
                    <span>
                        <i class="fa-solid fa-user"></i>
                    </span>
                    <span>
                        logout
                    </span>
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
import AppStorage from "../../Helpers/AppStorage";
import Notification from "../../Helpers/Notification";
import axios from 'axios';

export default {
    data() {
        return {
            categories: [],
            cartItems: [],
            cartTotal: 0,
            isMenuOpen: false,
            openCategory: null,
            isLoggedIn: !!AppStorage.getToken(),
        };
    },
    computed: {
        isHomePage() {
            return this.$route.name === 'index';
        },
        cartQtyCount() {
            return this.cartItems.reduce((acc, item) => acc + parseInt(item.qty), 0);
        }
    },
    created() {
        this.getTopCategoryData();
        this.getCartData();

        // গ্লোবাল ইভেন্ট লিসেনার: অন্য পেজ থেকে কার্ট আপডেট হলে এটি অটো কল হবে
        window.addEventListener('cart-updated', () => {
            this.getCartData();
        });
    },
    methods: {
        getCartData() {
            if (this.isLoggedIn) {
                axios.get('/api/cart')
                    .then((res) => {
                        this.cartItems = res.data;
                        this.calculateTotal();
                        console.log(res.data);
                    })
                    .catch((error) => console.log(error));
            }
        },
        calculateTotal() {
            this.cartTotal = this.cartItems.reduce((acc, item) => acc + (item.price * item.qty), 0);
        },
        removeCartItem(id) {
            axios.delete('/api/cart/' + id)
                .then(() => {
                    this.getCartData();
                    Notification.success("Item removed from cart");
                    // গ্লোবাল কাউন্ট আপডেট সিগন্যাল
                    window.dispatchEvent(new CustomEvent('cart-updated'));
                });
        },
        getTopCategoryData() {
            axios.get('/api/category')
                .then((res) => {
                    this.categories = res.data;
                }).catch((error) => {
                    console.log(error);
                })
        },
        logout() {
            const token = AppStorage.getToken();
            axios.post('/api/user/logout', {}, {
                headers: { 'Authorization': `Bearer ${token}` }
            })
                .then(() => {
                    AppStorage.clear();
                    this.isLoggedIn = false;
                    Notification.success("Logged Out!");
                    this.$router.push({ name: 'UserLogin' });
                }).catch((error) => {
                    console.error('Logout failed', error);
                    AppStorage.clear();
                    this.isLoggedIn = false;
                    this.$router.push({ name: 'UserLogin' });
                });
        },
        toggleCategory(categoryID) {
            if (this.openCategory === categoryID) {
                this.openCategory = null;
            } else {
                this.openCategory = categoryID;
            }
        },
    },
    watch: {
        '$route'() {
            this.isLoggedIn = !!AppStorage.getToken();
        },

    },

};
</script>

<style scoped>
.login_logout {
    cursor: pointer;
}

.login_logout-nv {
    cursor: pointer;
    color: #fff;
}

.mobile-menu {
    position: fixed;
    top: 0;
    left: -280px;
    width: 280px;
    height: 100%;
    background: #fff;
    z-index: 99999;
    transition: 0.3s ease-in-out;
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
    display: block !important;
}

.mobile-menu.menu-active {
    left: 0;
}

.menu-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 99998;
}

.heder__category a {
    text-decoration: none;
}
</style>
