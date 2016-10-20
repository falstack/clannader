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
        <bottom v-show="load && !isMobile" ref="bottom"></bottom>

        <music v-if="lazy && !isMobile" :source="source" ref="music"></music>
        <navsign v-if="lazy" ref="navsign"></navsign>
        <toast v-if="lazy" ref="toast"></toast>
        <top v-if="lazy && !isMobile"></top>
        <create v-if="lazy && isMobile"></create>
        <post v-if="lazy" ref="post"></post>
    </div>
</template>

<script lang="babel">

    Vue.http.options.root = "http://" + window.location.host;

    import top from './tools/top.vue'
    import toast from './tools/toast.vue'
    import navbar from './nav/navbar.vue'
    import banner from './nav/nav-banner.vue'
    import navsign from './nav/nav-sign.vue'
    import bottom from './tools/bottom.vue'
    import music from './vue-media/music.vue'
    import create from './tools/create.vue'
    import post from './post/create.vue'

    export default {
        components: {
            top, toast, navbar, banner, navsign, bottom, music, create, post
        },
        watch: {
            '$store.getters.isLogin' (val) {
                this.setAuthHeader(val);
                this.getUpToken(val);
            }
        },
        data () {
            return {
                lazy : false,
                load : true,
                uptoken : null,
                isMobile : null,
                source : {
                    src : "http://cdn.clannader.com/music/piano",
                    img : 'http://cdn.clannader.com/avatar',
                    player : "広橋真紀子",
                    album : "いのちの名前"
                }
            }
        },
        created () {
            this.userAngent();
            this.checkLogin();
            this.lazy = true;
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
                this.getUpToken(bool);
            },
            userAngent() {
                var userAgentInfo = navigator.userAgent;
                var Agents = ["Android", "iPhone", "SymbianOS", "Windows Phone", "iPad", "iPod"];
                var bool = false;
                for (var v = 0; v < Agents.length; v++) {
                    if (userAgentInfo.indexOf(Agents[v]) > 0) {
                        bool = true;
                        break;
                    }
                }
                this.isMobile = bool;
            },
            getUpToken(bool) {
                if (bool && this.uptoken === null) {
                    this.$http.post('/api/uptoken').then((res) => {
                        this.uptoken = res.body.uptoken
                    });
                }
            }
        }
    }
</script>