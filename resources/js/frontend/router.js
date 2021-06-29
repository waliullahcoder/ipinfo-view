import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Home from '../components/frontend/Home';
import ExampleComponent from '../components/ExampleComponent';

const router = new VueRouter({
    mode:'history',
  routes:[
      { path:'/test', component: Home },
      { path:'/ex', component: ExampleComponent }
  ]
})

export default router;