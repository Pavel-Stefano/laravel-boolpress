import Vue from 'vue';

import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomeComponent from './pages/HomeComponent';
import AboutComponent from './pages/AboutComponent';
import CarsComponent from './pages/CarsComponent';
import ContactComponent from './pages/ContactComponent';
import SingleCarComponent from './pages/SingleCarComponent';


const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomeComponent

        },
        {
            path: '/about',
            name: 'about',
            component: AboutComponent

        },
        {
            path: '/cars',
            name: 'cars',
            component: CarsComponent

        },
        {
            path: '/contact',
            name: 'contact',
            component: ContactComponent

        },
        {
            path: '/cars/:slug',
            name: 'single-car',
            component: SingleCarComponent

        },
    ]
});

export default router;