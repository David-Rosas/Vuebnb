import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import ListingPage from './components/ListingPage.vue';
export default new VueRouter({
mode: 'history',
routes:[
    //{path: '/', component:HomePage},
    {path: '/listing/:listing', component: ListingPage}
]
});
