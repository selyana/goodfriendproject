import Vue from 'vue'
import Vuex from 'vuex'
import Axios from 'axios'


Vue.use(Vuex);

let store = new Vuex.Store({
    state: {
        users: []
    },
    mutations: {
        addNewUser (state, user) {
            state.users.push(user)
        },
        checkUser (state, user) {
            state.users.email = user.email
            state.users.password = user.password
        }
    },
    getters: {
        getUsers (state) {
            return state.users
        }
    },
    actions: {
        addUser ({ commit }, user) {
            commit('addNewUser', user)
        },
        login({commit}, user){
            commit('checkUser', user)
        }
    }      
});

export default store;