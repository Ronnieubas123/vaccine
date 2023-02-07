import { createRouter, createWebHistory } from "vue-router"
import Dashboard from '../views/Admin/Dashboard.vue'
import Announcement from '../views/Admin/Announcement.vue'
import Vaccine from '../views/Admin/Vaccine.vue'
import VaccineCreate from '../views/Admin/VaccineCreate.vue'
import Vaccinee from '../views/Admin/Vaccinee.vue'
import AdminlteLayout from '../components/AdminlteLayout.vue'
import store from "../store"
import AuthLayout from '../components/AuthLayout.vue'
import Login from '../views/Login.vue'
import Register from '../views/Citizen/Register.vue'
import Barangay from '../views/Admin/Barangay.vue'
import BarangayCreate from '../views/Admin/BarangayCreate.vue'

import CitizenDefaultLayout from '../components/CitizenDefaultLayout.vue'
import RegisterForm from '../views/Citizen/RegisterForm.vue'
import LandingPage from '../views/Citizen/LandingPage.vue'


const routes = [
    {
        path: '/admin',  
        redirect: '/admin/dashboard',
        name: 'Dashboard',
        component: AdminlteLayout,
        meta: { requiresAuth: true},
        children: [
            { path: 'dashboard', name: 'Dashboard', component: Dashboard },
            { path: 'announcement', name: 'Announcement', component: Announcement },
            { path: 'vaccine', name: 'Vaccine', component: Vaccine },
            { path: 'vaccinee', name: 'Vaccinee', component: Vaccinee },
            { path: 'vaccine/create', name: 'VaccineCreate', component: VaccineCreate },
            { path: 'vaccine/:id', name: 'VaccineView', component: VaccineCreate},
            { path: 'barangay', name: 'Barangay', component: Barangay },
            { path: 'barangay/create', name: 'BarangayCreate', component: BarangayCreate },
            { path: 'barangay/:id', name:'BarangayView', component: BarangayCreate }
        ]
    },
    {
        path: '/auth',
        redirect: '/login',
        name: 'Auth',
        component: AuthLayout,
        meta: { isGuest: true },
        children: [
            {
                path: '/login',
                name: 'Login',
                component: Login
            },
            {
                path: '/register',
                name: 'Register',
                component: Register
            }
        ]
    },
    {
        path: '/',
        redirect: '/landingpage',
        name: 'LandingPage',
        component: CitizenDefaultLayout,
        meta: { requiresAuth: false},
        children: [
            { path: 'landingpage', name: 'LandingPage', component: LandingPage},
            { path: 'vaccine-registration', name: 'RegisterForm', component: RegisterForm },
        ]

    },

];

const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach((to, from, next)=> {
    if (to.meta.requiresAuth && !store.state.user.token) {
        next({name: 'Login'})
    } else if (store.state.user.token && (to.meta.isGuest)) {
        next({name: 'Dashboard'});
    } else {
        next();
    }
})

export default router
