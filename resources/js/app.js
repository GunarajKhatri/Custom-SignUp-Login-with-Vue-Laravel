/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

let Login=require('./components/Login.vue').default;
let Register=require('./components/Register.vue').default;
let Home=require('./components/Home.vue').default;

const routes=[
             {
             	path:'/login',component:Login,
             },
             {
             	 path:'/register',component:Register,
             	 
             },
             {
             	 path:'/login/home',component:Home,
             	 
             }
             
];
const router=new VueRouter({
	mode:'history',
	routes
});
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('Mymain', require('./components/Mymain.vue').default);

const app = new Vue({
    el: '#app',
    router,

});
