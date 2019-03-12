
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import VueTypedJs from 'vue-typed-js'
import runtime from 'serviceworker-webpack-plugin/lib/runtime';

window.Vue = require('vue');
Vue.use(VueTypedJs);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

new Vue({
    el: '#app',
});

/*
if ('serviceWorker' in navigator) {
    console.log('Registering service worker.');

    navigator.serviceWorker
        .register('js/service_worker.js', {scope: './js/'})
        .then(reg => console.log('Service worker registered.'))
        .catch(err => console.error(err));
}
 */

if ('serviceWorker' in navigator) {
    const registration = runtime.register();
}