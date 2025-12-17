<template>
    <div>
        <Navbar />
        <main><router-view /></main>
        <Footer />
    </div>
</template>

<script>
import Navbar from '../frontend/components/Navbar.vue';
import Footer from '../frontend/components/Footer.vue';

export default {
    components: {
        Navbar,
        Footer
    }
}
</script>

<style scoped></style>