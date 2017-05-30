import Vue from 'vue'
import VueRouter from 'vue-router'
import * as Index from '../components'

Vue.use(VueRouter)

Vue.config.productionTip = false

export default new VueRouter({
  mode: 'hash',
  base: __dirname,
  linkActiveClass: 'active',
  routes: [
    { path: '/', meta: { title: 'Home' }, name: 'home', component: Index.Home },
    { path: '*', meta: { title: 'Page not found' }, component: Index.Error404 }
  ]
})
