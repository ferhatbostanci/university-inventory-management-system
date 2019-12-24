import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        user : {}
    },
    mutations: {
        user_login(state, user){
            state.user = user;
        },
        user_logout(state){
            state.user = {};
        }
    },
    actions: {
        login({commit}, loginData){
            return new Promise((resolve, reject) => {
                const formData = new FormData();
                formData.set('email', loginData.email);
                formData.set('password', loginData.password);
                axios.post('http://slimapp.local/api/v1/auth', formData)
                    .then(response => {
                        localStorage.setItem('user', loginData.email);
                        commit('user_login', {email: loginData.email});
                        resolve(response);
                    }).catch(error => {
                        console.log(error.response.data);
                        Vue.swal.fire(
                            'Hata!',
                            error.response.data.description,
                            'error'
                        );
                        reject(error);
                    })
            });
        },
        logout({commit}){
            // eslint-disable-next-line no-unused-vars
            return new Promise((resolve, reject) => {
                console.log('logout');
                commit('user_logout');
                localStorage.removeItem('user');
                resolve();
            });
        }
    },
    getters : {
        isLoggedIn: state => !!state.user.email,
    }
})