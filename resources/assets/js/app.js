
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


// Require Froala Editor js file.
require('froala-editor/js/froala_editor.pkgd.min.js')

// Require Froala Editor css files.
require('froala-editor/css/froala_editor.pkgd.min.css')
require('font-awesome/css/font-awesome.css')
require('froala-editor/css/froala_style.min.css')



window.Vue = require('vue');

// Import and use Vue Froala lib.
import VueFroala from 'vue-froala-wysiwyg'

Vue.use(VueFroala)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('vue-editor',require('./components/Editor'))
Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('vue-typehead',require('./components/VueTypeHead.vue'));
Vue.component('home-component',require('./components/HomeComponent'))
Vue.component('create-category',require('./components/Admin/ProductCategory/CreateCategory'))
Vue.component('admin-products',require('./components/Admin/Products/Index'));
Vue.component('create-feature-combination',require('./components/Admin/Products/CreateFeatureCombination'))
Vue.component('vue-multselect',require('./components/Multiselect'));
Vue.component('show-products',require('./components/Admin/Products/ShowProduct'));
Vue.component('edit-product',require('./components/Admin/Products/EditProduct'));
Vue.component('home-show-product',require('./components/Front/HomeShowProduct'))
const app = new Vue({
    el: '#app'
});
