import Vue from 'vue'
import App from './App.vue'
import GSignInButton from 'vue-google-signin-button'

Vue.use(GSignInButton)


Vue.config.productionTip = false



new Vue({
  render: h => h(App),
}).$mount('#app')
