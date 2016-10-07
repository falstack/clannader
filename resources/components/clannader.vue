<style lang="sass" rel="scss" scoped>
    #app {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
    }
</style>

<template>
    <div id="app">
        <navbar ref="navbar"></navbar>
        <banner ref="banner"></banner>
        <navsign v-if="lazy" ref="navsign"></navsign>
        <div class="container">
            <div class="row">
                <router-view></router-view>
            </div>
        </div>
        <bottom v-if="lazy" ref="bottom"></bottom>
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
                this.makeWebSocket(val);
            }
        },
        data () {
            return {
                lazy : false,
                mobile : null,
                socket : null
            }
        },
        created () {
            this.lazy = true;
            this.checkLogin();
            this.userAngent();
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
                let bool = false;
                for (var v = 0; v < Agents.length; v++) {
                    if (userAgentInfo.indexOf(Agents[v]) > 0) {
                        bool = true;
                        break;
                    }
                }
                this.mobile = bool;
            },
            makeWebSocket (bool) {
                if (this.socket === null) {
                    this.socket = io("http://" + window.location.host + ":3001");
                }
                if (bool) {

                    this.socket.on('connection',function(data) {
                        console.log('connection is ok');
                    });

                    this.socket.on(this.$getUserInfo('zone') + ':msg',function(data) {
                        console.log(data);
                    });

                } else {
                    this.socket.disconnect();
                    this.socket = null;
                }
            }
        }
    }
</script>