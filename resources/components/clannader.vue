<template>
    <div>
        <navbar ref="navbar"></navbar>
        <banner ref="banner"></banner>
        <navsign ref="navsign"></navsign>
        <router-link to="/foo">go to foo</router-link>
        <router-link to="/bar">go to bar</router-link>
        <router-view></router-view>
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

    export default {
        components: {
            top, toast, navbar, banner, navsign
        },
        created () {
            let bool = document.getElementById('_auth').getAttribute('content') == 1;
            this.$store.dispatch('setLogin', { bool });
            this.userAngent();
        },
        methods: {
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
        },
        mounted () {
            this.$http.get('/api/user').then((res) => {
                console.log(res.body);
            }, (res) => {

            });
        }
    }
</script>