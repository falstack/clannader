<style lang="sass" rel="scss" scoped>
    #app {
        display: flex;
        min-height: 100vh;
        background-color: #fff;
        flex-direction: column;
    }
</style>

<template>
    <div id="app">
        <navbar ref="navbar"></navbar>
        <banner v-show="load" ref="banner"></banner>
        <router-view></router-view>
        <bottom v-show="load" ref="bottom"></bottom>

        <navsign v-if="lazy" ref="navsign"></navsign>
        <toast v-if="lazy" ref="toast"></toast>
        <top v-if="lazy"></top>
    </div>
</template>

<script>

    Vue.http.options.root = "http://" + window.location.host;

    import top from './tools/top.vue'
    import toast from './tools/toast.vue'
    import navbar from './nav/narbar.vue'
    import banner from './nav/nav-banner.vue'
    import navsign from './nav/nav-sign.vue'
    import bottom from './tools/bottom.vue'

    export default {
        components: {
            top, toast, navbar, banner, navsign, bottom
        },
        watch: {
            '$store.getters.isLogin' (val) {
                this.setAuthHeader(val);
            }
        },
        data () {
            return {
                lazy : false,
                load : true
            }
        },
        created () {
            this.userAngent();
            this.lazy = true;
            this.checkLogin();
        },
        methods: {
            setAuthHeader (val) {
                if (val) {
                    Vue.http.headers.common['Authorization'] = 'Bearer ' + this.$getUserInfo('token');
                } else {
                    Vue.http.headers.common['Authorization'] = 'null';
                }
            },
            checkLogin() {
                let bool = document.getElementById('_auth').getAttribute('content') == 1;
                this.$store.dispatch('setLogin', { bool });
                this.setAuthHeader(bool);
            },
            userAngent() {
                var userAgentInfo = navigator.userAgent;
                var Agents = ["Android", "iPhone", "SymbianOS", "Windows Phone", "iPad", "iPod"];
                for (var v = 0; v < Agents.length; v++) {
                    if (userAgentInfo.indexOf(Agents[v]) > 0) {
                        // redirect to mobile site
                        break;
                    }
                }
            }
        }
    }
</script>