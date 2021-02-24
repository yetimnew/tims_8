require('./bootstrap');
window.Vue = require('vue').default;
import common from './common';
Vue.mixin(common);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('dashboard', require('./components/Dashboard.vue').default);

const app = new Vue({
    el: '#app',
});

