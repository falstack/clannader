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
        <navsign ref="navsign"></navsign>
        <div class="container">
            <div class="row">
                <router-view></router-view>
            </div>
        </div>
        <bottom ref="bottom"></bottom>
        <top></top>
        <toast ref="toast"></toast>
    </div>
</template>

<script>

    Vue.http.options.root = "http://" + window.location.host;
    Vue.http.headers.common['X-CSRF-TOKEN'] = document.getElementById('_token').getAttribute('content');

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
        created () {
            this.checkLogin();
            this.userAngent();
        },
        methods: {
            checkLogin() {
                let bool = document.getElementById('_auth').getAttribute('content') == 1;
                if (bool) {
                    this.$store.dispatch('setLogin', { bool });
                }
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
                this.$store.dispatch('setMobile', { bool });
            }
        }
    }
</script>