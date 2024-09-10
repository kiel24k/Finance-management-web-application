import { createWebHistory, createRouter } from "vue-router";

const routes = [
    {
        path:'/',
        component: () => import('../pages/client/Dashboard.vue')
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router;