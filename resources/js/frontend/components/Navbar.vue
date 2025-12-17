<template>

    <div class="mobile-menu">
        <div class="mobile-menu-logo">
            <div class="logo-image">
                <img :src="`/uploads/category/1761399037-woman-bag.webp`" alt="" class="side_cat_img" />
            </div>
            <div class="mobile-menu-close">
                <i class="fa fa-times"></i>
            </div>
        </div>
        <ul class="first-nav">
            <li class="parent-category">
                <a href="category/women-bags.html" class="menu-category-name">
                    <img :src="`/uploads/category/1761399037-woman-bag.webp`" alt="" class="side_cat_img" />
                    Women Bags
                </a>
                <span class="menu-category-toggle">
                    <i class="fa fa-chevron-down"></i>
                </span>
                <ul class="second-nav" style="display: none;">
                    <li class="parent-subcategory">
                        <a href="subcategory/demo.html" class="menu-subcategory-name">demo</a>
                        <ul class="third-nav" style="display: none;">
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="parent-category">
                <a href="category/hijabs.html" class="menu-category-name">
                    <img :src="`/uploads/category/1761399044-hijab.webp`" alt="" class="side_cat_img" />
                    Hijabs
                </a>
                <ul class="second-nav" style="display: none;">
                </ul>
            </li>
            <li class="parent-category">
                <a href="category/boy-fashion.html" class="menu-category-name">
                    <img :src="`/uploads/category/1761399055-uniform.webp`" alt="" class="side_cat_img" />
                    Boy Fashion
                </a>
                <ul class="second-nav" style="display: none;">
                </ul>
            </li>
            <li class="parent-category">
                <a href="category/smart-watch.html" class="menu-category-name">
                    <img :src="`/uploads/category/1761399063-smartwatch.webp`" alt="" class="side_cat_img" />
                    Smart Watch
                </a>
                <ul class="second-nav" style="display: none;">
                </ul>
            </li>
            <li class="parent-category">
                <a href="category/western-dress.html" class="menu-category-name">
                    <img :src="`/uploads/category/1761399071-short-dress.webp`" alt="" class="side_cat_img" />
                    Western dress
                </a>
                <ul class="second-nav" style="display: none;">
                </ul>
            </li>
            <li class="parent-category">
                <a href="category/skin-care.html" class="menu-category-name">
                    <img :src="`/uploads/category/1761399079-face-cream.webp`" alt="" class="side_cat_img" />
                    Skin Care
                </a>
                <ul class="second-nav" style="display: none;">
                </ul>
            </li>
            <li class="parent-category">
                <a href="category/undergarments.html" class="menu-category-name">
                    <img :src="`/uploads/category/1761399093-underwear.webp`" alt="" class="side_cat_img" />
                    undergarments
                </a>
                <ul class="second-nav" style="display: none;">
                </ul>
            </li>
            <li class="parent-category">
                <a href="category/makeup.html" class="menu-category-name">
                    <img :src="`/uploads/category/1761399100-make-up.webp`" alt="" class="side_cat_img" />
                    Makeup
                </a>
                <ul class="second-nav" style="display: none;">
                </ul>
            </li>
            <li class="parent-category">
                <a href="category/accessories.html" class="menu-category-name">
                    <img :src="`/uploads/category/1761399107-hair-styling.webp`" alt="" class="side_cat_img" />
                    Accessories
                </a>
                <ul class="second-nav" style="display: none;">
                </ul>
            </li>
            <li class="parent-category">
                <a href="category/women-t-shirt.html" class="menu-category-name">
                    <img :src="`/uploads/category/1761454578-tshirt.webp`" alt="" class="side_cat_img" />
                    Women T-Shirt
                </a>
                <ul class="second-nav" style="display: none;">
                </ul>
            </li>
        </ul>
    </div>
    <header id="navbar_top">
        <div class="mobile-header sticky">
            <div class="mobile-logo">
                <div class="menu-bar">
                    <a class="toggle">
                        <i class="fa-solid fa-bars"></i>
                    </a>
                </div>
                <div class="menu-logo">
                    <a href="index.html"><img :src="`/uploads/settings/1761407468-jnsshopbd-(1).webp`" alt="" /></a>
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
                <button><i data-feather="search"></i></button>
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
                                    <a href="index.html"><img :src="`/uploads/settings/1761407468-jnsshopbd-(1).webp`"
                                            alt="" /></a>
                                </div>
                                <div class="main-search">
                                    <form action="https://ecom.shariatpur.shop/search">
                                        <input type="text" placeholder="Search Product..."
                                            class="search_keyword search_click" name="keyword" />
                                        <button>
                                            <i data-feather="search"></i>
                                        </button>
                                    </form>
                                    <div class="search_result"></div>
                                </div>
                                <div class="header-list-items">
                                    <ul class="mb-0">
                                        <li class="track_btn">
                                            <a class="text-black text-decoration-none" href="customer/order-track.html">
                                                <i class="fa fa-truck"></i>Track
                                                Order</a>
                                        </li>


                                        <li class="cart-dialog" id="cart-qty">
                                            <a href="customer/checkout.html">
                                                <p class="margin-shopping">
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                    <span>0</span>
                                                </p>
                                            </a>
                                            <div class="cshort-summary">
                                                <ul>
                                                </ul>
                                                <p><strong>Total : ৳0.00</strong></p>
                                                <a href="customer/checkout.html" class="go_cart text-decoration-none">
                                                    Buy Now </a>
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
                                            <a href="#">TOP CATEGORIES <i class="fa-solid fa-list"></i>
                                            </a>
                                            <div class="sidebar-menu side__bar">
                                                <ul class="hideshow">
                                                    <li>
                                                        <a href="category/women-bags.html">
                                                            <img :src="`/uploads/category/1761399037-woman-bag.webp`"
                                                                alt="" />
                                                            Women Bags
                                                            <i class="fa-solid fa-chevron-right"></i>
                                                        </a>
                                                        <ul class="sidebar-submenu">
                                                            <li>
                                                                <a href="subcategory/demo.html">
                                                                    demo <i class="fa-solid fa-chevron-right"></i> </a>
                                                                <ul class="sidebar-childmenu">
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="category/hijabs.html">
                                                            <img :src="`/uploads/category/1761399044-hijab.webp`"
                                                                alt="" />
                                                            Hijabs
                                                            <i class="fa-solid fa-chevron-right"></i>
                                                        </a>
                                                        <ul class="sidebar-submenu">
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="category/boy-fashion.html">
                                                            <img :src="`/uploads/category/1761399055-uniform.webp`"
                                                                alt="" />
                                                            Boy Fashion
                                                            <i class="fa-solid fa-chevron-right"></i>
                                                        </a>
                                                        <ul class="sidebar-submenu">
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="category/smart-watch.html">
                                                            <img :src="`/uploads/category/1761399063-smartwatch.webp`"
                                                                alt="" />
                                                            Smart Watch
                                                            <i class="fa-solid fa-chevron-right"></i>
                                                        </a>
                                                        <ul class="sidebar-submenu">
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="category/western-dress.html">
                                                            <img :src="`/uploads/category/1761399071-short-dress.webp`"
                                                                alt="" />
                                                            Western dress
                                                            <i class="fa-solid fa-chevron-right"></i>
                                                        </a>
                                                        <ul class="sidebar-submenu">
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="category/skin-care.html">
                                                            <img :src="`/uploads/category/1761399079-face-cream.webp`"
                                                                alt="" />
                                                            Skin Care
                                                            <i class="fa-solid fa-chevron-right"></i>
                                                        </a>
                                                        <ul class="sidebar-submenu">
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="category/undergarments.html">
                                                            <img :src="`/uploads/category/1761399093-underwear.webp`"
                                                                alt="" />
                                                            undergarments
                                                            <i class="fa-solid fa-chevron-right"></i>
                                                        </a>
                                                        <ul class="sidebar-submenu">
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="category/makeup.html">
                                                            <img :src="`/uploads/category/1761399100-make-up.webp`"
                                                                alt="" />
                                                            Makeup
                                                            <i class="fa-solid fa-chevron-right"></i>
                                                        </a>
                                                        <ul class="sidebar-submenu">
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="category/accessories.html">
                                                            <img :src="`/uploads/category/1761399107-hair-styling.webp`"
                                                                alt="" />
                                                            Accessories
                                                            <i class="fa-solid fa-chevron-right"></i>
                                                        </a>
                                                        <ul class="sidebar-submenu">
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="category/women-t-shirt.html">
                                                            <img :src="`/uploads/category/1761454578-tshirt.webp`"
                                                                alt="" />
                                                            Women T-Shirt
                                                            <i class="fa-solid fa-chevron-right"></i>
                                                        </a>
                                                        <ul class="sidebar-submenu">
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </div>


                                    <div>
                                        <li><router-link :to="{ name: 'index' }">Home</router-link></li>
                                    </div>
                                    <div>
                                        <li><a href="hot-deals.html">Offers</a></li>
                                    </div>






                                    <div class="contact__menu">
                                        <li><a href="site/contact-us.html">Contact</a></li>
                                    </div>
                                    <div class="right__menu__top">
                                        <li class="for_order">
                                            <p>
                                                <a>
                                                    <router-link :to="{ name: 'UserLogin' }"><i
                                                            class="fa-regular fa-user"></i>Login /
                                                        Sign
                                                        Up</router-link>


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
</template>

<script>
export default {

}
</script>

<style scoped>
.heder__category a {
    text-decoration: none;
}
</style>