import { createRouter, createWebHistory} from "vue-router";
import adminRouter from "./admin";
import userRouter from "./user";
import publicRouter from "./public";

const routes = [...adminRouter, ...userRouter, ...publicRouter];

const router = createRouter({
    history : createWebHistory(),
    routes,
});

export default router;