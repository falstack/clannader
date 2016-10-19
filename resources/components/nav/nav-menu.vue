<style lang="sass" rel="scss" scoped>

    @import "../../static/sass/variables";

    .warp {
        width: 100%;
        height: 100%;
        background-color: #fff;
        padding: 20px 0;
        display: flex;
        flex-direction: column;

        .head {
            border-bottom: 1px solid $color-gray-bg;
            margin-bottom: 10px;
            padding-bottom: 10px;
            padding-left: 20px;
            height: 60px;
            display: flex;
            align-items: center;

            .uface {
                width: 40px;
                height: 40px;
            }

            .info {
                margin-left: 10px;
            }

            button {
                padding: 10px 20px;
            }

            .sign-in {
                border: 1px solid #ccc;

                &:hover {
                    background: linear-gradient(#fff,#f7f7f7);
                    text-shadow: 0 -1px 0 rgba(0,0,0,.1);
                }
            }

            .sign-up {
                color: #fff;
                margin-left: 10px;
                border: 1px solid $color-blue;
                background-color: $color-blue;

                &:hover {
                    background: linear-gradient($color-blue,$color-blue-hover);
                    text-shadow: 0 -1px 0 rgba(0,0,0,.1);
                    color: #fff;
                    border: 1px solid $color-blue-hover;
                    opacity: 1;
                }
            }
        }

        .body, .foot {

            a {
                display: block;
                width: 100%;
                height: 30px;
                line-height: 30px;
                padding-left: 20px;
                box-sizing: border-box;
                font-size: 13px;
                background-color: #fff;

                &:hover {
                    background-color: $color-gray-hover;
                }
            }
        }

        .foot {
            margin-top: 10px;
            padding-top: 10px;
            border-top: 1px solid $color-gray-bg;
        }
    }
</style>

<template>
    <div class="warp">
        <div class="head" v-if="$store.getters.isLogin" @click="close">
            <router-link :to="'/people/' + $parent.$data.user.home" class="uface"><img :src="$getUserInfo('avatar')"></router-link>
            <div class="info">
                <router-link :to="'/people/' + $parent.$data.user.home">{{ $parent.$data.user.name }}</router-link>
            </div>
        </div>
        <div class="head" v-else>
            <button class="sign-in" @click="$root.$refs.navsign.showLogin()">登录</button>
            <button class="sign-up" @click="$root.$refs.navsign.showRegister()">注册</button>
        </div>
        <ul class="body" @click="close">
            <li>
                <router-link to="/posts">帖子</router-link>
            </li>
            <li>
                <router-link to="/door/star">番组</router-link>
            </li>
            <li>
                <router-link to="/dollars">DOLLARS</router-link>
            </li>
        </ul>
        <div class="foot" v-if="$store.getters.isLogin">
            <a @click="$root.$refs.navbar.logout()">退出</a>
        </div>
    </div>
</template>

<script lang="babel">

    export default {
        methods: {
            close () {
                this.$parent.$data.showMenu = false
            }
        }
    }
</script>