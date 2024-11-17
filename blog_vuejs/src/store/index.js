import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    loading: false,
    // cartProducts: JSON.parse(localStorage.getItem('products')) || [],
    cartProductsCounts: JSON.parse(localStorage.getItem('products_counts')) || {},
  },
  mutations: {
    ADD_PRODUCT: (state, product) => {
      // !state.cartProducts.includes(product.id)?state.cartProducts.push(product.id):'';
      !state.cartProductsCounts[product.id]?state.cartProductsCounts[product.id]=1:state.cartProductsCounts[product.id]+=1;
      state.cartProductsCounts = {...state.cartProductsCounts};
      localStorage.setItem('products', JSON.stringify(state.cartProducts))
      localStorage.setItem('products_counts', JSON.stringify(state.cartProductsCounts))
    },
    ADD_CURRENT_PRODUCT: (state, product) => {
      !state.cartProductsCounts[product.index]?state.cartProductsCounts[product.index]=product.count:state.cartProductsCounts[product.index]=parseInt(state.cartProductsCounts[product.index])+product.count;
      state.cartProductsCounts = {...state.cartProductsCounts};
      localStorage.setItem('products_counts', JSON.stringify(state.cartProductsCounts))
    },
    REMOVE_PRODUCT: (state, index) => {
      // state.cartProducts.splice(index, 1);
      // state.cartProducts.splice(state.cartProducts.indexOf(index), 1);
      delete state.cartProductsCounts[index];
      state.cartProductsCounts = {...state.cartProductsCounts};
      localStorage.setItem('products', JSON.stringify(state.cartProducts))
      localStorage.setItem('products_counts', JSON.stringify(state.cartProductsCounts))
    },
    EMPTY_CART: (state, index) => {
      state.cartProductsCounts = {};
      localStorage.removeItem('products_counts')
    },
    CHANGE_COUNT: (state, index) => {
      state.cartProductsCounts = { ...state.cartProductsCounts, [index.index]: index.count }
      localStorage.setItem('products_counts', JSON.stringify(state.cartProductsCounts))
    },
  },
  actions: {
    FB_Parse() {
      setTimeout(()=>{
        window.FB.XFBML.parse()
      },0)
    },
    addProduct: ({commit}, product) => {
      commit('ADD_PRODUCT', product);
    },
    addCurrentProduct: ({commit}, product) => {
      commit('ADD_CURRENT_PRODUCT', product);
    },
    removeProduct: ({commit}, index) => {
      commit('REMOVE_PRODUCT', index);
    },
    emptyCart: ({commit}, index) => {
      commit('EMPTY_CART', index);
    },
    changeProductCount: ({commit}, index) => {
      commit('CHANGE_COUNT', index);
    },
  },
  getters: {
    // getProductsInCart: state => state.cartProducts,
    getProductsInCart: state => Object.keys(state.cartProductsCounts),
    getProductsCounts: state =>state.cartProductsCounts,
  },
  modules: {
  }
})
