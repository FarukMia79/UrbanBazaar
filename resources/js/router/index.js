import { createRouter, createWebHistory } from "vue-router";
import adminRouter from "./admin";
import userRouter from "./user";
import AppStorage from '../Helpers/AppStorage';

const routes = [...adminRouter, ...userRouter];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

// Navigation Guard add
router.beforeEach((to, from, next) => {
    const token = AppStorage.getToken();

    if (to.matched.some((record) => record.meta.requiresAuth) && !token) {
        next({ name: "AdminLogin" });
    } else if (to.name === "AdminLogin" && token) {
        next({ name: "dashboard" });
    } else {
        next();
    }
});

export default router;