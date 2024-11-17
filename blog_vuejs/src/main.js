import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import Axios from 'axios'
// import JQuery from 'vue-jquery'
// import JQuery from 'jquery'
import i18n from './i18n'
try {
  window.$ = window.jQuery = require('jquery');
} catch (e) {}
// window.$ = window.jQuery = JQuery;
// window.api_host = 'http://127.0.0.1:8000/';

Vue.prototype.$Project_seotitle = {
  en: ' – Tlc Total Life',
  ru: ' – Tlc Total Life',
  am: ' – Tlc Total Life',
};

Vue.prototype.$http = Axios;
Vue.config.productionTip = false;
Vue.prototype.$ApiHost = 'http://18.158.228.22:8080';

Vue.config.productionTip = false;

new Vue({
  router,
  store,
  i18n,
  render: h => h(App)
}).$mount('#app')
