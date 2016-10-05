export default new Vuex.Store({
    state: {
        login : false,
        socket : null,
        qiniuToken : ""
    },

    mutations: {
        SET_LOGIN (state, { bool }) {
            state.login = bool
        },
        INIT_SOCKET (state, object) {
            state.socket = object
        },
        SET_QINIU_TOKEN (state, val) {
            state.qiniuToken = val
        }
    },

    actions: {
        setLogin: ({ commit }, { bool }) => {
            commit('SET_LOGIN', { bool })
        }
    },

    getters: {
        getLogin: state => {
            return state.login
        }
    }
})