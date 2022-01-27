import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'
import vuetify from './plugins/vuetify'
import router from './router/router'
import store from './store'


Vue.config.productionTip = false

Vue.use(VueRouter)

new Vue({
  store,
  vuetify,
  router,
  render: h => h(App)
}).$mount('#app')