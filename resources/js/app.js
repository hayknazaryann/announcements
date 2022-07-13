require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './components/App.vue';
Vue.use(VueAxios, axios);

import IndexComponent from './components/announcements/Index.vue';
import CreateComponent from './components/announcements/Create.vue';
import ShowComponent from './components/announcements/Show.vue';

const routes = [
    {
        name: 'home',
        path: '/',
        component: IndexComponent
    },
    {
        name: 'announcements',
        path: '/announcements',
        component: IndexComponent
    },
    {
        name: 'announcements.create',
        path: '/announcements/create',
        component: CreateComponent
    },
    {
        name: 'announcements.show',
        path: '/announcements/:id',
        component: ShowComponent
    }

];

const router = new VueRouter({ mode: 'history', routes: routes});

const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});
