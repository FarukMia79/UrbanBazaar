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
    const user = AppStorage.getUser(); 

    if (to.matched.some((record) => record.meta.requiresAdmin)) {
        if (!token || (user && user.role !== 'admin')) {
            next({ name: "index" }); 
        } else {
            next(); 
        }
    } 
    else if (to.matched.some((record) => record.meta.requiresAuth)) {
        if (!token) {
            next({ name: "UserLogin" });
        } else {
            next();
        }
    } 
    else if ((to.name === "AdminLogin" || to.name === "UserLogin") && token) {
        next({ name: "index" });
    } 
    else {
        next();
    }
});

export default router;