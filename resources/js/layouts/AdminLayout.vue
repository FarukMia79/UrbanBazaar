<template>
    <div class="posi">
        <navbar />
        <div id="layoutSidenav" class="bd-color">
            <SideNav />
            <div id="layoutSidenav_content">
                <router-view />
                <Footer />
            </div>
        </div>
    </div>
</template>

<script>
import Navbar from "../backEnd/layout/Navbar.vue";
import SideNav from "../backEnd/layout/SideNav.vue";
import Footer from "../backEnd/layout/footer.vue";
export default {
    components: {
        Navbar,
        SideNav,
        Footer,
    },
};
</script>

<style>
.posi{
    margin-top: -65px;
}
.bd-color {
    background-color: #eff1f4;
}
</style>
