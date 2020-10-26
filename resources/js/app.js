require('./bootstrap');
window.Vue = require('vue');

import VueRouter from 'vue-router'
import User from './components/Helpers/User.js'
import {
    routes
} from "./routes";
import Vuetify from 'vuetify'
import VueSimplemde from 'vue-simplemde'
import 'simplemde/dist/simplemde.min.css'

Vue.component('home', require('./components/Home.vue').default);
Vue.component('vue-simplemde', VueSimplemde)

window.User = User;
window.EventBus = new Vue();


Vue.use(Vuetify)
export default new Vuetify({
    rtl: true,
})
Vue.use(VueRouter)
const router = new VueRouter({
    routes,
    mode: 'history'
})


const app = new Vue({
    el: '#app',
    router,
    vuetify: new Vuetify(),
    // components:{
    //     App
    // }

});
