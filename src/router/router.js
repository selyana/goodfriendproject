import Vue from 'vue'
import VueRouter from 'vue-router'

import Main from '../components/Main'
import Find from '../pages/Find'
import Reviews from '../pages/Reviews'
import Services from '../pages/Services'
import About from '../pages/About'
import Sitter from '../pages/Sitter'
import Login from '../pages/Login'
import Profile from '../pages/Profile'
import Registration from '../pages/Registration'
import Become from '../pages/Become'

Vue.use(VueRouter);

let router = new VueRouter({
    routes: [
        {
            path: '',
            component: Main
        },
        {
            path: '/find-sitter',
            component: Find
        },
        {
            path: '/reviews',
            component: Reviews
        },
        {
            path: '/services',
            component: Services
        },    
        {
            path: '/become-sitter',
            component: Become
        },
        {
            path: '/find-sitter/:id',
            name: 'find-sitter',           
            component: Sitter
        },
        {
            path: '/about',
            component: About
        },
        {
            path: '/login',
            component: Login
        },
        {
            path: '/profile',
            component: Profile
        },
        {
            path: '/registration',
            component: Registration
        }
    ],
    mode: 'history'
})


export default router;


