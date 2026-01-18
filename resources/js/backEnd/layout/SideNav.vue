<template>
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <router-link class="nav-link NavHover" :to="{ name: 'dashboard'}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        Dashboard
                    </router-link>
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <a
                        class="nav-link collapsed NavHover"
                        href="#"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseLayouts1"
                        aria-expanded="false"
                        aria-controls="collapseLayouts"
                    >
                        <div class="sb-nav-link-icon">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                        Orders
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>
                    <div
                        class="collapse"
                        id="collapseLayouts1"
                        aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion"
                    >
                        <nav class="sb-sidenav-menu-nested nav">
                            <router-link class="nav-link NavHover" :to="{ name: 'AllOrder'}"><i class="fa-solid fa-file-medical me-1"></i>All Order</router-link>
                            <router-link class="nav-link  NavHover" :to="{ name: 'PendingOrder'}"><i class="fa-solid fa-file-medical me-1"></i>Pending</router-link>
                            <router-link class="nav-link  NavHover" :to="{ name: 'CompletedOrder'}"><i class="fa-solid fa-file-medical me-1"></i>Completed Order</router-link>
                            <router-link class="nav-link  NavHover" :to="{ name: 'CancelledOrder'}"><i class="fa-solid fa-file-medical me-1"></i>Cancelled Order</router-link>
                        </nav>
                    </div>
                    <a
                        class="nav-link collapsed NavHover"
                        href="#"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseLayouts2"
                        aria-expanded="false"
                        aria-controls="collapseLayouts"
                    >
                        <div class="sb-nav-link-icon">
                            <i class="fa-solid fa-database"></i>
                        </div>
                        Products
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>
                    <div
                        class="collapse"
                        id="collapseLayouts2"
                        aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion"
                    >
                        <nav class="sb-sidenav-menu-nested nav">
                            <router-link class="nav-link NavHover" :to="{ name: 'ProductManage'}"><i class="fa-solid fa-file-medical me-1"></i>Product Manage</router-link>
                            <router-link class="nav-link NavHover" :to="{ name: 'CategoryIndex'}"><i class="fa-solid fa-file-medical me-1"></i>Categories</router-link>
                            <router-link class="nav-link NavHover" :to="{ name: 'SubCategoryIndex'}"><i class="fa-solid fa-file-medical me-1"></i>Subcategories</router-link>
                            <router-link class="nav-link NavHover" :to="{ name: 'ChildcategoryManage'}"><i class="fa-solid fa-file-medical me-1"></i>Childcategories</router-link>
                            <router-link class="nav-link NavHover" :to="{ name: 'BrandManage'}"><i class="fa-solid fa-file-medical me-1"></i>Brand</router-link>
                            <router-link class="nav-link NavHover" :to="{ name: 'ColorManage'}"><i class="fa-solid fa-file-medical me-1"></i>Color</router-link>
                            <router-link class="nav-link NavHover" :to="{ name: 'SizeIndex'}"><i class="fa-solid fa-file-medical me-1"></i>Sizes</router-link>
                            <router-link class="nav-link NavHover" :to="{ name: 'ProductPriceManage'}"><i class="fa-solid fa-file-medical me-1"></i>Price Edit</router-link>
                            <router-link class="nav-link NavHover" :to="{ name: 'CouponManagement'}"><i class="fa-solid fa-file-medical me-1"></i>Coupon</router-link>
                        </nav>
                    </div>
                    <!--Reviews Side Manue-->
                    <a
                        class="nav-link collapsed NavHover"
                        href="#"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseLayouts3"
                        aria-expanded="false"
                        aria-controls="collapseLayouts"
                    >
                        <div class="sb-nav-link-icon">
                            <i class="fa-solid fa-star"></i>
                        </div>
                        Reviews
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>
                    <div
                        class="collapse"
                        id="collapseLayouts3"
                        aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion"
                    >
                        <nav class="sb-sidenav-menu-nested nav">
                            <router-link class="nav-link NavHover" :to="{ name: ''}"><i class="fa-solid fa-file-medical me-1"></i>Pending Reviews</router-link>
                            <router-link class="nav-link NavHover" :to="{ name: ''}"><i class="fa-solid fa-file-medical me-1"></i>Create Reviews</router-link>
                            <router-link class="nav-link NavHover" :to="{ name: 'AllReviews'}"><i class="fa-solid fa-file-medical me-1"></i>All Reviews</router-link>
                        </nav>
                    </div>
                    <!--Landing Page Side Manue-->
                    <a
                        class="nav-link collapsed NavHover"
                        href="#"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseLayouts4"
                        aria-expanded="false"
                        aria-controls="collapseLayouts"
                    >
                        <div class="sb-nav-link-icon">
                            <i class="fa-solid fa-window-maximize"></i>
                        </div>
                        Landing Page
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>
                    <div
                        class="collapse"
                        id="collapseLayouts4"
                        aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion"
                    >
                        <nav class="sb-sidenav-menu-nested nav">
                            <router-link class="nav-link NavHover" :to="{ name: ''}"><i class="fa-solid fa-file-medical me-1"></i>Create</router-link>
                            <router-link class="nav-link NavHover" :to="{ name: ''}"><i class="fa-solid fa-file-medical me-1"></i>Campaign</router-link>
                        </nav>
                    </div>
                    <!--Users Side Manue-->
                    <a
                        class="nav-link collapsed NavHover"
                        href="#"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseLayouts5"
                        aria-expanded="false"
                        aria-controls="collapseLayouts"
                    >
                        <div class="sb-nav-link-icon">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        Users
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>
                    <div
                        class="collapse"
                        id="collapseLayouts5"
                        aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion"
                    >
                        <nav class="sb-sidenav-menu-nested nav">
                            <router-link class="nav-link NavHover" :to="{ name: 'UsersManage'}"><i class="fa-solid fa-file-medical me-1"></i>User</router-link>
                            <router-link class="nav-link NavHover" :to="{ name: 'CustomerManage'}"><i class="fa-solid fa-file-medical me-1"></i>Customers</router-link>
                        </nav>
                    </div>
                    
                    <div class="sb-sidenav-menu-heading">Setting</div>
                    <!--Setting Side Manue-->
                    <a
                        class="nav-link collapsed NavHover"
                        href="#"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseLayouts6"
                        aria-expanded="false"
                        aria-controls="collapseLayouts"
                    >
                        <div class="sb-nav-link-icon">
                            <i class="fa-solid fa-gear"></i>
                        </div>
                        Site Setting
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>
                    <div
                        class="collapse"
                        id="collapseLayouts6"
                        aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion"
                    >
                        <nav class="sb-sidenav-menu-nested nav">
                            <router-link class="nav-link NavHover" :to="{ name: 'GeneralSetting'}"><i class="fa-solid fa-file-medical me-1"></i>General Setting</router-link>
                            <router-link class="nav-link NavHover" :to="{ name: 'PixelsManage'}"><i class="fa-solid fa-file-medical me-1"></i>Pixels Setting</router-link>
                        </nav>
                    </div>
                    <!--Banner Setting Side Manue-->
                    <a
                        class="nav-link collapsed NavHover"
                        href="#"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseLayouts7"
                        aria-expanded="false"
                        aria-controls="collapseLayouts"
                    >
                        <div class="sb-nav-link-icon">
                            <i class="fa-solid fa-images"></i>
                        </div>
                        Banner & Adds
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>
                    <div
                        class="collapse"
                        id="collapseLayouts7"
                        aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion"
                    >
                        <nav class="sb-sidenav-menu-nested nav">
                            <router-link class="nav-link NavHover" :to="{ name: 'BannerCategory'}"><i class="fa-solid fa-file-medical me-1"></i>Banner Category</router-link>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Start Bootstrap
            </div>
        </nav>
    </div>
</template>
<script>
export default {};
</script>
<style lang="css" scoped>
.NavHover:hover {
    background-color: #00897b !important;
    color: #ffffff !important;
}
</style>
