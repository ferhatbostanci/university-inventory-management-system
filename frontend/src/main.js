import Vue from 'vue'
import App from './App'
import router from './router'
import store from './store'
import axios from 'axios'
import CoreuiVue from '@coreui/vue'
import { iconsSet as icons } from './assets/icons/icons.js'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

// Login check
router.beforeEach((to, from, next) => {
  const user = localStorage.getItem('user');
  const publicPages = ['/users/login', '/404', '/500'];
  const authRequired = !publicPages.includes(to.path);

  if (authRequired && !user) {
    console.log('sa');
    window.location.href = '/users/login'
  }

  document.title = to.meta.title || 'UIMS - Beta';
  next();
});

Vue.config.performance = true;
Vue.use(CoreuiVue);
Vue.use(VueSweetalert2);

new Vue({
  el: '#app',
  router,
  store,
  icons,
  template: '<App/>',
  components: {
    App
  },
});