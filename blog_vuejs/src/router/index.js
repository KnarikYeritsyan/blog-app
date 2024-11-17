import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import store from '../store/index.js'
import axios from "axios/index";
import i18n from "../i18n";
import Category from "../views/Category";
import Product from '../views/Product.vue';

Vue.use(VueRouter)
const title =
  {
    en: 'Tlc Total Life',
    ru: 'Tlc Total Life',
    am: 'Tlc Total Life',
  };
const routes = [
  {
    path: '/',
    redirect: `/${i18n.locale}`
  },
  {
    path: '/:lang(en|ru|am)?',
    component:{
      render(c){return c('router-view')}
    },
    children:[
      {
        path: '',
        name: 'Home',
        component: Home,
        meta: {
          title: {
            en: 'Tlc Total Life',
            ru: 'Tlc Total Life',
            am: 'Tlc Total Life',
          },
        }
      },
  {
    path: 'contact',
    name: 'contact',
    component: () => import(/* webpackChunkName: "about" */ '../views/Contact.vue'),
    meta: {
      title: {
        en: 'Contacts – Tlc Total Life',
        ru: 'Контакты – Tlc Total Life',
        am: 'Կոնտակտներ – Tlc Total Life',
      },
    }
  },
  {
    path: 'marketing',
    name: 'marketing',
    component: () => import(/* webpackChunkName: "about" */ '../views/Marketing.vue'),
    meta: {
      title: {
        en: 'Contacts – Tlc Total Life',
        ru: 'Контакты – Tlc Total Life',
        am: 'Մարկետինգ – Tlc Total Life',
      },
    }
  },
  {
    path: 'webinar',
    name: 'webinar',
    component: () => import(/* webpackChunkName: "about" */ '../views/Webinar.vue'),
    meta: {
      title: {
        en: 'Webinar – Tlc Total Life',
        ru: 'Webinar – Tlc Total Life',
        am: 'Վեբինար – Tlc Total Life',
      },
    }
  },
  {
    path: 'register',
    name: 'register',
    component: () => import(/* webpackChunkName: "about" */ '../views/Register.vue'),
    meta: {
      title: {
        en: 'register – Tlc Total Life',
        ru: 'register – Tlc Total Life',
        am: 'Գրանցվել – Tlc Total Life',
      },
    }
  },
  {
    path: 'videos',
    name: 'videos',
    component: () => import(/* webpackChunkName: "about" */ '../views/Videos.vue'),
    meta: {
      title: {
        en: 'Videos – Tlc Total Life',
        ru: 'Videos – Tlc Total Life',
        am: 'Վիդեոներ – Tlc Total Life',
      },
    }
  },
  {
    path: 'product/:slug',
    name: 'product',
    component: Product,
  },
  {
    path: 'products',
    name: 'products',
    component: () => import('../views/Shop.vue'),
    meta: {
      title: {
        en: 'Online store – Tlc Total Life',
        ru: 'Интернет-магазин – Tlc Total Life',
        am: 'Ապրանքներ – Tlc Total Life',
      },
    }
  },
  {
    path: 'about',
    name: 'About',
    component: () => import(/* webpackChunkName: "about" */ '../views/About.vue'),
    meta: {
      title: {
        en: 'About us – Tlc Total Life',
        ru: 'О компании – Tlc Total Life',
        am: 'Մեր մասին – Tlc Total Life',
      },
    }
  },
  {
    path: ':slug',
    name: 'page',
    component: () => import(/* webpackChunkName: "about" */ '../views/Page.vue')
  }
  ]
}
]

const router = new VueRouter({
  mode: 'history',
  scrollBehavior() {
    return { x: 0, y: 0 };
  },
  base: process.env.BASE_URL,
  routes
});

router.beforeEach((to, from, next) => {
  let language = to.params.lang;
  if(!language){
    language = 'am';
  }
  i18n.locale = language;
  axios.defaults.headers.common['Content-Language'] = i18n.locale;
  // next();
  if(to.meta.title) {
    window.document.title = to.meta.title && to.meta.title[i18n.locale] ? to.meta.title[i18n.locale] :
        title[i18n.locale];
  }
    next();
})
axios.interceptors.response.use(null, (error) => {
  if (error.response.status == 500) {
      window.location.replace('/');
    return Promise.reject(error);
  }
});
export default router
