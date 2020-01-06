import Vue from 'vue'
import Vuex from 'vuex'

import pmStore from './modules/pmStore'
import clockStore from './modules/clockStore'
import memberStore from './modules/memberStore'
Vue.use(Vuex)
export default new Vuex.Store({
  strict: true,
  state: {
    isLogin: false
  },
  mutations: {
    changeLoginStatus (state, status) {
      state.isLogin = status
    }
  },
  actions: {
  },
  modules: {
    pmStore: pmStore(),
    clockStore: clockStore(),
    memberStore: memberStore()
  }
})
