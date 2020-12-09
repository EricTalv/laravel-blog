/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Import tag component library
 */
import VueTags from "vue-tags";

/**
 *  Import vue form validation library
 */
import Vuelidate from 'vuelidate';

/**
 * Import date formating libraty
 */
import moment from 'moment';

/**
 *  We can use this in any vue component
 *  this will format the date accordingly
 *  {{  data-to-format | formatDate }}
 */
// Vue.filter('formatDate', function(value) {
//     if (value) {
//         return moment(String(value)).format('MM.DD.YYYY hh:mm')
//     }
// });
//

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

 //const files = require.context('./', true, /\.vue$/i)
 //files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component("input-tags", VueTags);

Vue.use(Vuelidate);

Vue.component('tag-input', require('./components/TagInput.vue').default);

Vue.component('article-form', require('./components/ArticleForm.vue').default);

/**
 * Fetch userName from META variable and set it as $userName
 */
Vue.prototype.$userName = document.querySelector("meta[name='user-name']").getAttribute('content');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

