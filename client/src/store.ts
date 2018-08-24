import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    globalIsLight: true,
  },
  mutations: {
    changeTheme(state, value: boolean) {
      state.globalIsLight = value;
    },
  },
  actions: {

  },
});
