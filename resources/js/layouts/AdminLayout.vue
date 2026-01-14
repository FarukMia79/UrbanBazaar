<template>
    <navbar />
    <div id="layoutSidenav">
        <SideNav />
        <div id="layoutSidenav_content">
            <router-view />
            <Footer />
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

<style></style>
