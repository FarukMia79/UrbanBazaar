<template>
    <div class="mobile-menu" :class="{ 'menu-active': isMenuOpen }">
        <div class="mobile-menu-logo">
            <div class="logo-image">
                <img
                    :src="`/uploads/category/1761399037-woman-bag.webp`"
                    alt=""
                    class="side_cat_img"
                />
            </div>
            <div class="mobile-menu-close" @click="isMenuOpen = false">
                <i class="fa fa-times"></i>
            </div>
        </div>
        <ul class="first-nav">
            <li class="parent-category">
                <a href="category/women-bags.html" class="menu-category-name">
                    <img
                        :src="`/uploads/category/1761399037-woman-bag.webp`"
                        alt=""
                        class="side_cat_img"
                    />
                    Women Bags
                </a>
                <span class="menu-category-toggle">
                    <i class="fa fa-chevron-down"></i>
                </span>
                <ul class="second-nav" style="display: none">
                    <li class="parent-subcategory">
                        <a
                            href="subcategory/demo.html"
                            class="menu-subcategory-name"
                            >demo</a
                        >
                        <ul class="third-nav" style="display: none"></ul>
                    </li>
                </ul>
            </li>
            <li class="parent-category">
                <a href="category/hijabs.html" class="menu-category-name">
                    <img
                        :src="`/uploads/category/1761399044-hijab.webp`"
                        alt=""
                        class="side_cat_img"
                    />
                    Hijabs
                </a>
                <ul class="second-nav" style="display: none"></ul>
            </li>
            <li class="parent-category">
                <a href="category/boy-fashion.html" class="menu-category-name">
                    <img
                        :src="`/uploads/category/1761399055-uniform.webp`"
                        alt=""
                        class="side_cat_img"
                    />
                    Boy Fashion
                </a>
                <ul class="second-nav" style="display: none"></ul>
            </li>
            <li class="parent-category">
                <a href="category/smart-watch.html" class="menu-category-name">
                    <img
                        :src="`/uploads/category/1761399063-smartwatch.webp`"
                        alt=""
                        class="side_cat_img"
                    />
                    Smart Watch
                </a>
                <ul class="second-nav" style="display: none"></ul>
            </li>
            <li class="parent-category">
                <a
                    href="category/western-dress.html"
                    class="menu-category-name"
                >
                    <img
                        :src="`/uploads/category/1761399071-short-dress.webp`"
                        alt=""
                        class="side_cat_img"
                    />
                    Western dress
                </a>
                <ul class="second-nav" style="display: none"></ul>
            </li>
            <li class="parent-category">
                <a href="category/skin-care.html" class="menu-category-name">
                    <img
                        :src="`/uploads/category/1761399079-face-cream.webp`"
                        alt=""
                        class="side_cat_img"
                    />
                    Skin Care
                </a>
                <ul class="second-nav" style="display: none"></ul>
            </li>
            <li class="parent-category">
                <a
                    href="category/undergarments.html"
                    class="menu-category-name"
                >
                    <img
                        :src="`/uploads/category/1761399093-underwear.webp`"
                        alt=""
                        class="side_cat_img"
                    />
                    undergarments
                </a>
                <ul class="second-nav" style="display: none"></ul>
            </li>
            <li class="parent-category">
                <a href="category/makeup.html" class="menu-category-name">
                    <img
                        :src="`/uploads/category/1761399100-make-up.webp`"
                        alt=""
                        class="side_cat_img"
                    />
                    Makeup
                </a>
                <ul class="second-nav" style="display: none"></ul>
            </li>
            <li class="parent-category">
                <a href="category/accessories.html" class="menu-category-name">
                    <img
                        :src="`/uploads/category/1761399107-hair-styling.webp`"
                        alt=""
                        class="side_cat_img"
                    />
                    Accessories
                </a>
                <ul class="second-nav" style="display: none"></ul>
            </li>
            <li class="parent-category">
                <a
                    href="category/women-t-shirt.html"
                    class="menu-category-name"
                >
                    <img
                        :src="`/uploads/category/1761454578-tshirt.webp`"
                        alt=""
                        class="side_cat_img"
                    />
                    Women T-Shirt
                </a>
                <ul class="second-nav" style="display: none"></ul>
            </li>
        </ul>
    </div>
    <div
        class="menu-overlay"
        v-if="isMenuOpen"
        @click="isMenuOpen = false"
    ></div>
    <header id="navbar_top">
        <div class="mobile-header sticky">
            <div class="mobile-logo">
                <div class="menu-bar">
                    <a class="toggle" @click.prevent="isMenuOpen = true">
                        <i class="fa-solid fa-bars"></i>
                    </a>
                </div>
                <div class="menu-logo">
                    <router-link :to="{ name: 'index' }"
                        ><img
                            :src="`/uploads/settings/1761407468-jnsshopbd-(1).webp`"
                            alt=""
                    /></router-link>
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
                <input
                    type="text"
                    placeholder="Search Product ... "
                    value=""
                    class="msearch_keyword msearch_click"
                    name="keyword"
                />
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
                                    <router-link :to="{ name: 'index' }"
                                        ><img
                                            :src="`/uploads/settings/1761407468-jnsshopbd-(1).webp`"
                                            alt=""
                                    /></router-link>
                                </div>
                                <div class="main-search">
                                    <form action="#">
                                        <input
                                            type="text"
                                            placeholder="Search Product..."
                                            class="search_keyword search_click"
                                            name="keyword"
                                        />
                                        <button>
                                            <i
                                                class="fa fa-search text-white"
                                            ></i>
                                        </button>
                                    </form>
                                    <div class="search_result"></div>
                                </div>
                                <div class="header-list-items">
                                    <ul class="mb-0">
                                        <li class="track_btn">
                                            <router-link
                                                :to="{ name: 'OrderTrack' }"
                                                class="text-black text-decoration-none"
                                                ><i class="fa fa-truck"></i
                                                >Track Order</router-link
                                            >
                                        </li>

                                        <li class="cart-dialog" id="cart-qty">
                                            <a href="customer/checkout.html">
                                                <p class="margin-shopping">
                                                    <i
                                                        class="fa-solid fa-cart-shopping"
                                                    ></i>
                                                    <span>0</span>
                                                </p>
                                            </a>
                                            <div class="cshort-summary">
                                                <ul></ul>
                                                <p>
                                                    <strong
                                                        >Total : ৳0.00</strong
                                                    >
                                                </p>
                                                <router-link
                                                    :to="{ name: 'CheckOut' }"
                                                    class="go_cart text-decoration-none"
                                                    >Buy Now</router-link
                                                >
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
                                        <li class="all__category__list">
                                            <a href="#"
                                                >TOP CATEGORIES
                                                <i class="fa-solid fa-list"></i>
                                            </a>
                                            <div class="sidebar-menu side__bar">
                                                <ul class="hideshow">
                                                    <li>
                                                        <router-link
                                                            :to="{
                                                                name: 'CategoryPage',
                                                            }"
                                                            ><img
                                                                :src="`/uploads/category/1761399037-woman-bag.webp`"
                                                                alt="" />Women
                                                            Bags<i
                                                                class="fa-solid fa-chevron-right"
                                                            ></i
                                                        ></router-link>
                                                        <ul
                                                            class="sidebar-submenu"
                                                        >
                                                            <li>
                                                                <a
                                                                    href="subcategory/demo.html"
                                                                >
                                                                    demo
                                                                    <i
                                                                        class="fa-solid fa-chevron-right"
                                                                    ></i>
                                                                </a>
                                                                <ul
                                                                    class="sidebar-childmenu"
                                                                ></ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="category/hijabs.html"
                                                        >
                                                            <img
                                                                :src="`/uploads/category/1761399044-hijab.webp`"
                                                                alt=""
                                                            />
                                                            Hijabs
                                                            <i
                                                                class="fa-solid fa-chevron-right"
                                                            ></i>
                                                        </a>
                                                        <ul
                                                            class="sidebar-submenu"
                                                        ></ul>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="category/boy-fashion.html"
                                                        >
                                                            <img
                                                                :src="`/uploads/category/1761399055-uniform.webp`"
                                                                alt=""
                                                            />
                                                            Boy Fashion
                                                            <i
                                                                class="fa-solid fa-chevron-right"
                                                            ></i>
                                                        </a>
                                                        <ul
                                                            class="sidebar-submenu"
                                                        ></ul>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="category/smart-watch.html"
                                                        >
                                                            <img
                                                                :src="`/uploads/category/1761399063-smartwatch.webp`"
                                                                alt=""
                                                            />
                                                            Smart Watch
                                                            <i
                                                                class="fa-solid fa-chevron-right"
                                                            ></i>
                                                        </a>
                                                        <ul
                                                            class="sidebar-submenu"
                                                        ></ul>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="category/western-dress.html"
                                                        >
                                                            <img
                                                                :src="`/uploads/category/1761399071-short-dress.webp`"
                                                                alt=""
                                                            />
                                                            Western dress
                                                            <i
                                                                class="fa-solid fa-chevron-right"
                                                            ></i>
                                                        </a>
                                                        <ul
                                                            class="sidebar-submenu"
                                                        ></ul>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="category/skin-care.html"
                                                        >
                                                            <img
                                                                :src="`/uploads/category/1761399079-face-cream.webp`"
                                                                alt=""
                                                            />
                                                            Skin Care
                                                            <i
                                                                class="fa-solid fa-chevron-right"
                                                            ></i>
                                                        </a>
                                                        <ul
                                                            class="sidebar-submenu"
                                                        ></ul>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="category/undergarments.html"
                                                        >
                                                            <img
                                                                :src="`/uploads/category/1761399093-underwear.webp`"
                                                                alt=""
                                                            />
                                                            undergarments
                                                            <i
                                                                class="fa-solid fa-chevron-right"
                                                            ></i>
                                                        </a>
                                                        <ul
                                                            class="sidebar-submenu"
                                                        ></ul>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="category/makeup.html"
                                                        >
                                                            <img
                                                                :src="`/uploads/category/1761399100-make-up.webp`"
                                                                alt=""
                                                            />
                                                            Makeup
                                                            <i
                                                                class="fa-solid fa-chevron-right"
                                                            ></i>
                                                        </a>
                                                        <ul
                                                            class="sidebar-submenu"
                                                        ></ul>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="category/accessories.html"
                                                        >
                                                            <img
                                                                :src="`/uploads/category/1761399107-hair-styling.webp`"
                                                                alt=""
                                                            />
                                                            Accessories
                                                            <i
                                                                class="fa-solid fa-chevron-right"
                                                            ></i>
                                                        </a>
                                                        <ul
                                                            class="sidebar-submenu"
                                                        ></ul>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="category/women-t-shirt.html"
                                                        >
                                                            <img
                                                                :src="`/uploads/category/1761454578-tshirt.webp`"
                                                                alt=""
                                                            />
                                                            Women T-Shirt
                                                            <i
                                                                class="fa-solid fa-chevron-right"
                                                            ></i>
                                                        </a>
                                                        <ul
                                                            class="sidebar-submenu"
                                                        ></ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </div>

                                    <div>
                                        <li>
                                            <router-link :to="{ name: 'index' }"
                                                >Home</router-link
                                            >
                                        </li>
                                    </div>
                                    <div>
                                        <li>
                                            <router-link
                                                :to="{ name: 'HotDeal' }"
                                                >Offers</router-link
                                            >
                                        </li>
                                    </div>

                                    <div class="contact__menu">
                                        <li>
                                            <router-link
                                                :to="{ name: 'Contact' }"
                                                >Contact</router-link
                                            >
                                        </li>
                                    </div>
                                    <div class="right__menu__top">
                                        <li class="for_order">
                                            <p>
                                                <a>
                                                    <router-link
                                                        :to="{
                                                            name: 'UserLogin',
                                                        }"
                                                        ><i
                                                            class="fa-regular fa-user me-2"
                                                        ></i
                                                        >Login / Sign
                                                        Up</router-link
                                                    >
                                                </a>
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
                <a
                    class="col"
                    href="https://api.whatsapp.com/send?phone=+8801790647979&amp;text=Hello"
                >
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
            <li>
                <router-link class="col" :to="{ name: 'UserLogin' }">
                    <span>
                        <i class="fa-solid fa-user"></i>
                    </span>
                    <span>Login</span>
                </router-link>
            </li>
        </ul>
    </div>
</template>

<script>
import CheckOut from "../page/CheckOut.vue";

export default {
    data() {
        return {
            isMenuOpen: false,
        };
    },
};
</script>

<style scoped>
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
