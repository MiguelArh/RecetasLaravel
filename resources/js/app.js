/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 import VueSweetalert2 from 'vue-sweetalert2';
 import 'sweetalert2/dist/sweetalert2.min.css';

 import 'owl.carousel/dist/assets/owl.carousel.css';
import 'owl.carousel';

require('./bootstrap');

window.Vue = require('vue');



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.use(VueSweetalert2);
Vue.config.ignoredElements = [
    'trix-editor', 'trix-toolbar'
];

Vue.component('fecha-receta', require('./components/FechaReceta.vue').default);
Vue.component('eliminar-receta', require('./components/EliminarReceta.vue').default);
Vue.component('crear-receta', require('./components/CrearReceta.vue').default);
Vue.component('boton-like', require('./components/BotonLike.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

/* Carrousel con Owl*/

jQuery(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        margin: 10,
        autoplay: true,
        autoplayTimeout: 2000,
        rewind: true,
        autoplayHoverPause: true,
        responsive: {
            0 : {
                items: 1
            },

            600 : {
                items: 2
            },

            1000 : {
                items: 3
            }
        },

    });
});


