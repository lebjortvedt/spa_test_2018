import Vue from 'vue'
import VueRouter from 'vue-router';
import axios from 'axios';
import VueAxios from 'vue-axios';
import VueAuth from '@websanova/vue-auth'
import { routes } from './routes';

Vue.use(VueRouter);

Vue.use(VueAxios, axios);

const router = new VueRouter({
    mode: 'history',
    routes
});

Vue.router = router;

router.beforeEach((to, from, next) => {
    console.log(to.matched.some(record => record.meta.requiresAuth));
    if(to.matched.some(record => record.meta.requiresAuth)) {
        consonle.log(localStorage);
        if (localStorage.getItem('jwt') == null) {
             console.log('User is redirected to login');
                router.push('/vue/login')
        } else {
            console.log('User is already logged in');
            let user = JSON.parse(localStorage.getItem('user'))
            next();
        }
    } else
    next();

})


new Vue({
  el: '#app',
  router
});



