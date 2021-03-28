require('./bootstrap');

window.Vue = require('vue');
import {routes} from './router/index'
import VueRouter from 'vue-router'
import Vue from 'vue';

import { Form, HasError, AlertError } from 'vform'
import Swal from 'sweetalert2'
import Vuex from 'vuex'

import moment from 'moment'
Vue.filter('timeFormat', (arg) => {
  return moment(arg).format("MMM Do YY");
})

Vue.use(Vuex)
import storeData from './store/index'
const store = new Vuex.Store(
  storeData
)

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})


window.Toast = Toast;

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component('admin-template', require('./components/admin/Master.vue').default);
Vue.component('home-template', require('./components/Home/Master.vue').default);


window.Form = Form;
Vue.use(VueRouter)
const router = new VueRouter({
    routes,
    mode: 'hash'
  })


const app = new Vue({
    el: '#app',
    router,
    store
});
