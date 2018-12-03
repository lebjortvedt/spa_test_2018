import Home from './components/Home.vue';
import Example from './components/Example.vue';
import Login from './components/Login.vue';
import Register from './components/Register.vue';
import IndexComponent from './components/IndexComponent.vue';
import CreateComponent from './components/CreateComponent.vue';
import EditComponent from './components/EditComponent.vue';

export const routes = [
    { path: '/vue', component: IndexComponent, name: 'Songs', meta: {requiresAuth: true}},
    { path: '/vue/login', component: Login, name: 'Login', meta: {guest: true}},
    { path: '/vue/register', component: Register, name: 'Register', meta: {guest: true}},
    { path: '/vue/create', component: CreateComponent, name: 'Create' , meta: {requiresAuth: true}},
    { path: '/vue/edit', component: EditComponent, name: 'Edit', meta: {requiresAuth: true}},

];
