
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

import App from './components/app.vue';
import CompaniesIndex from './components/companies/CompaniesIndex.vue';
import CompaniesCreate from './components/companies/CompaniesCreate.vue';
import CompaniesEdit from './components/companies/CompaniesEdit.vue';

const routes = [
    {path: '/', component: App, name: 'home'},
    {
        path: '/companies',
        components: {
            companiesIndex: CompaniesIndex
        },
        name: 'companies'
    },
    {path: '/companies/create', component: CompaniesCreate, name: 'createCompany'},
    {path: '/companies/edit/:id', component: CompaniesEdit, name: 'editCompany'},
]

const router = new VueRouter({ routes })

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});
