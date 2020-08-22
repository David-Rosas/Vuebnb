/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');

import Vuetify from 'vuetify'

Vue.use(Vuetify)

import { populateAmenitiesAndPrices} from './helpers';
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('image-carousel', require('./components/ImageCarousel.vue').default);
Vue.component('modal-window', require('./components/ModalWindow.vue').default);
Vue.component('header-image', require('./components/HeaderImage.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
let model = JSON.parse(window.vuebnb_listing_model);
model = populateAmenitiesAndPrices(model);
const app = new Vue({
    vuetify: new Vuetify(),
    el: '#app',
    data: Object.assign(model,{
        headerImageStyle: {
            'background-image': `url(${model.images[0]})`
          }
        }),
        methods:{
            openModal(){
                this.$refs.imagemodal.modalOpen =  true;
            }
        }


});
