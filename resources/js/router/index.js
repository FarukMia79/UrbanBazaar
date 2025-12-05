import { createRouter, createWebHistory } from "vue-router";
import adminRouter from "./admin";
import userRouter from "./user";

const routes = [...adminRouter, ...userRouter];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;