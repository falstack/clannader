export default new Vuex.Store({
    state: {
        login : false,
        mobile : false,
        socket : null,
        qiniuToken : ""
    },

    mutations: {
        SET_LOGIN (state, { bool }) {
            state.login = bool
        },
        SET_MOBILE (state, { bool }) {
            state.mobile = bool
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
        },
        setMobile: ({ commit }, { bool }) => {
            commit('SET_MOBILE', { bool })
        }
    },

    getters: {
        isLogin: state => {
            return state.login
        },
        isMobile: state => {
            return state.mobile
        }
    }
})