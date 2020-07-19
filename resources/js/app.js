require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

/*Route Inport*/
import {routes} from './routes';

Vue.component('sidenav', require('./components/inc/menu.vue').default)

const router = new VueRouter({
  routes,
  mode: 'history'
})

const app = new Vue({
    el: '#app',
    router
});
