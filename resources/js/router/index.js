import { createWebHistory, createRouter } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import("../pages/client/Home.vue"),
    },
    {
        path: "/login",
        component: () => import("../auth/login.vue"),
        name: "login",
    },
    {
        path: "/signup",
        component: () => import("../auth/signup.vue"),
        name: "signup",
    },
    {
        path: "/client-dashboard",
        component: () => import("../pages/client/Dashboard.vue"),
        name: "client-dashboard",
    },
    {
        path: "/client-settings",
        component: () => import("../pages/client/Settings.vue"),
        name: "client-settings",
    },
    {
        path: "/client-manage",
        component: () => import("../pages/client/Manage.vue"),
        name: "client-manage",
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
