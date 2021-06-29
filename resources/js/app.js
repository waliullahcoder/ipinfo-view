
require('./bootstrap');

window.Vue = require('vue').default;


Vue.component('example-component', require('./components/ExampleComponent.vue').default);

import Home from './components/frontend/Home'

import router from './frontend/router'


const app = new Vue({
    el: '#app',
    router,
    Home,
    data: {
        test: 'Test Data'
    }
});
