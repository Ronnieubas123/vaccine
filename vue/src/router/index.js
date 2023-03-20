import { createRouter, createWebHistory } from "vue-router";
import Dashboard from '../views/Admin/Dashboard.vue';
import Announcement from '../views/Admin/Announcement.vue';
import Vaccine from '../views/Admin/Vaccine.vue';
import VaccineCreate from '../views/Admin/VaccineCreate.vue';
import Vaccinee from '../views/Admin/Vaccinee.vue';
import AdminlteLayout from '../components/AdminlteLayout.vue';
import store from "../store";
import AuthLayout from '../components/AuthLayout.vue';
import Login from '../views/Login.vue';
import Register from '../views/Citizen/Register.vue';
import Barangay from '../views/Admin/Barangay.vue';
import BarangayCreate from '../views/Admin/BarangayCreate.vue';
import VaccineRegistration from '../views/Admin/VaccineRegistration.vue';
import Reportss from '../views/Admin/Reportss.vue';
import AnnouncementCreate from '../views/Admin/AnnouncementCreate.vue';
import User from '../views/Admin/User.vue';
import UserCreate from '../views/Admin/UserCreate.vue';
import Logistic from '../views/Admin/Logistic.vue';
import LogisticCreate from '../views/Admin/LogisticCreate.vue';
import Schedule from '../views/Admin/Schedule.vue';
import ScheduleCreate from '../views/Admin/ScheduleCreate.vue';
import Inventory from '../views/Admin/Inventory.vue';
import VaccineUsed from '../views/Admin/VaccineUsed.vue';




import CitizenDefaultLayout from '../components/CitizenDefaultLayout.vue';
import RegisterForm from '../views/Citizen/RegisterForm.vue';
import LandingPage from '../views/Citizen/LandingPage.vue';
import TrackRequestStatus from '../views/Citizen/TrackRequestStatus.vue';
import CitizineAnnouncement from '../views/Citizen/CitizineAnnouncement.vue';


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
            { path: 'barangay/:id', name:'BarangayView', component: BarangayCreate },
            { path: 'vaccine-registration', name:'VaccineRegistration', component: VaccineRegistration },
            { path: 'reports', name:'Reports', component: Reportss },
            { path: 'announcement-create', name:'AnnouncementCreate', component: AnnouncementCreate },
            { path: 'announcement/:id', name:'AnnouncementView', component: AnnouncementCreate },
            { path: 'users-create', name:'UserCreate', component: UserCreate },
            { path: 'users', name:'User', component: User },
            { path: 'users/:id', name:'UsersView', component: UserCreate },
            { path: 'vaccine-logistic', name:'Logistic', component: Logistic },
            { path: 'vaccine-logistic-create', name:'LogisticCreate', component: LogisticCreate },
            { path: 'vaccine-logistic/:id', name:'LogisticView', component: LogisticCreate },
            { path: 'schedule', name:'Schedule', component: Schedule },
            { path: 'schedule/create', name:'ScheduleCreate', component: ScheduleCreate },
            { path: 'schedule/:id', name:'ScheduleView', component: ScheduleCreate },
            { path: 'inventory', name:'Inventory', component: Inventory },
            { path: 'vaccine/used', name:'VaccineUsed', component: VaccineUsed },
            { path: 'used/:id', name:'VaccineUsedView', component: VaccineUsed },
            
            
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
            { path: 'track-request-status', name: 'TrackRequestStatus', component: TrackRequestStatus},
            { path: 'c-announcement', name: 'CitizineAnnouncement', component: CitizineAnnouncement}
            
        ]

    },

];

const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach((to, from, next)=> {
    if (to.meta.requiresAuth && !store.state.user.token ) {
        next({name: 'Login'})
    } else if (store.state.user.token && store.state.user.type === 'Admin' && (to.meta.isGuest)) {
        next({name: 'Dashboard'});
    } else if(store.state.user.token && store.state.user.type === 'Bhw' && (to.meta.isGuest)) {
        next({name: 'Vaccinee'});
    } else if(store.state.user.token && store.state.user.type === 'BS' && (to.meta.isGuest)) {
        next({name: 'Reports'});
    }
    else {
        next();
    }
})

export default router
