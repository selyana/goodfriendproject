import Vue from 'vue';
import Vuex from 'vuex';
import reviews from './modules/reviews';
import services from './modules/services';

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    reviews,
    services    
  }
});
