import { createWebHistory, createRouter } from "vue-router";

const routes = [
    {
        path:'/',
        component: () => import('../pages/client/Home.vue')
    },
    {
        path: '/login',
        component: () => import('../auth/login.vue'),
        name: 'login'
    },
    {
        path: '/signup',
        component: () => import('../auth/signup.vue'),
        name: 'signup'
    }
]

const router = createRouter({
    history: createWebHistory(),
routes,
})

export default router;