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
                            <i class="fa-solid fa-cart-shopping"></i>
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
                        </nav>
                    </div>
                    
                    <div class="sb-sidenav-menu-heading">Addons</div>
                    <a class="nav-link" href="charts.html">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-chart-area"></i>
                        </div>
                        Charts
                    </a>
                    <a class="nav-link" href="tables.html">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-table"></i>
                        </div>
                        Tables
                    </a>
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
<style lang="css">
.NavHover:hover {
    background-color: #00897b !important; /* আগের চেয়ে একটু গাঢ় সবুজ */
    color: #ffffff !important;
}
</style>
