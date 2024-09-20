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
    {
        path: '/client-profile',
        component: () => import('../pages/client/Profile..vue'),
        name: 'client-profile'
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
})

// router.beforeEach((to, from) => {
//     const token = localStorage.getItem('userT')
// })

export default router;
