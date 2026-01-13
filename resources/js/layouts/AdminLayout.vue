<template>
    <navbar />
    <div class="content">
        <router-view />
    </div>
</template>

<script>
import Navbar from "../backEnd/layout/Navbar.vue";
export default {
    components: {
        Navbar,
    },
};
</script>

<style scoped></style>
