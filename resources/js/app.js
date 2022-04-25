/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import{createApp} from 'vue';
import {router} from './routes';
window.Vue = require('vue').default;
const app = createApp();

import VueAxios from 'vue-axios';
import axios from 'axios';








/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

app.component('mostrar-cartelera', require('./components/Home.vue').default);
app.component('crear-pelicula', require('./components/CrearPelicula.vue').default);
app.component('mostrar-pelicula', require('./components/pelicula/Mostrar.vue').default);
app.use(router);
app.use(VueAxios, axios);
app.mount('#app');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
