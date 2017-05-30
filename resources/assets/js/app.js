import Vue from 'vue'
import App from './components/App.vue'
import router from './router'
import './bootstrap'

router.beforeEach((to, from, next) => {
  document.title = to.meta.title + ' - ' + window.Global.app_name
  next()
})

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  template: '<App/>',
  components: { App }
})
