<style lang="sass" rel="scss">
    @import "../../static/sass/variables";
    $nav-height : 45px;

    #nav-warp {
        position: absolute;
        width: 100%;
    }

    #nav-mobile {

    }

    #nav-pc {
        position: relative;
        height: $nav-height;

        #nav-box {
            height: 100%;
            z-index: 10;

            .row {
                height: 100%;
            }

            #nav-left, #nav-right {
                height: 100%;
                display: flex;
                align-items: center;
            }

            #nav-left {
                float: left;

                #icon {
                    width: 120px;
                    height: 16px;
                    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJYAAAAUCAMAAABYpzQDAAAAAXNSR0IArs4c6QAAAF1QTFRF////AAAA////////////////////////////////////////////////////////////////////////////////////////////////////////////bm5ubGxs9qS2NwAAABx0Uk5TIAAMFB4XDgkbEerRQ/ncdziuU+C+j4F+n7Gbbm+PKT8AAAJQSURBVEjHzdZtd7IwDAZgpuiU0Ep5Eeap/v+f+dxJWigOHdt5PpAvrjslXJKQmn08x2cSO8SR46yxRxw4TjHyMTJE/HwVebxMkhw43V4zy112u3jjbPL4GJti+SQ2w/LzeGJ98f8sWJeinFit75TVmy6wyOXZ1XRBQU4/sVH/GCS5qVeyPr1fdCkra4oSVyL5jFU1lgKrKOqEhdWMxRsDy/KFvQlZfmLB8Xg8xHO/3yeXsshqEW9FmbL64lqUyrItJSysZqxr0QWosk4nsmtZDBNV+riEdTH12Fspi6gqXGBVTZewwiqyZOOMVTVuBStIhDUro7C+2uMSqzTdqbWBhTrWEwvPp55Y2Ji1dsbChUhSGdzGcRnsDX/8kkVukXWzTKsDK5fCRVamZVTWYJlWz1g98uBF2e8rA9fFoiArn5Z/z0IduJAusqRwI0vLKCwtYBQmLHJcQ2Q8X0x3/E+s3simog6snAs3srSMYrnGjU+sqqmZhS9wRtb1LP+W1codSp5YyuLCTSwpo7C0rUoZZiMLL3Vpwm1+Yn2fXa9bHkklv6eRhe+dsLiMzMJG6XZPs5anA9otvol/Yi0OCHxdyT9w0yuLCzexdAVJHFnc9JGFZ3cIRfwz60jt93FKFCYQj67AQuESlqx4aOlKOn8cp4QcRNpb5SvWx3tWZeTwITz1yOpxrulRPdiJhVMmYfEKDR8OIpkT8fCxmsPFAfEb1vNR3XIRw2tFsUlybvrIynCniQWSi3M0NP0QmlyPahmn3esiLrq28jNwo79Ot8T6Bx2zbidNmDptAAAAAElFTkSuQmCC);
                    background-repeat: no-repeat;
                    background-size: contain;
                    background-position: center;
                }

                .nav-left-ul {
                    >li {
                        float: left;
                    }
                }

                .nav-link {
                    color: #fff;
                    padding: 5px 20px;
                    border-radius: 10px;
                    background-color: transparent;
                    transition: .4s;
                    font-size: 14px;
                    margin: 0 5px;

                    &:hover {
                        background-color: #fff;
                        color: $color-blue-hover;
                        transition: 0s;
                    }
                }
            }

            #nav-right {
                float: right;

                #signIn, #signUp {
                    border-radius: 2px;
                    width: 52px;
                    height: 34px;
                    line-height: 32px;
                    color: #fff;
                    text-align: center;
                    display: block;
                    float: left;
                    font-size: 14px;
                }

                #signIn {
                    border: 1px solid #fff;
                    background-color: transparent;

                    &:hover {
                        background: linear-gradient(#fff,#f7f7f7);
                        text-shadow: 0 -1px 0 rgba(0,0,0,.1);
                        color: #000;
                        border: 1px solid #ccc;
                    }
                }

                #signUp {
                    margin-left: 7px;
                    border: 1px solid $color-blue;
                    background-color: $color-blue;
                    opacity: .8;

                    &:hover {
                        background: linear-gradient($color-blue,$color-blue-hover);
                        text-shadow: 0 -1px 0 rgba(0,0,0,.1);
                        color: #fff;
                        border: 1px solid $color-blue-hover;
                        opacity: 1;
                    }
                }
            }
        }

        #nav-mask {
            width: 100%;
            height: 100px;
            position: absolute;
            left: 0;
            top: 0;
            z-index: 5;
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAABkCAYAAABOx/oaAAAAAXNSR0IArs4c6QAAAX5JREFUSA2llAtuwzAMQ5NtN9r9r9bUZP0I2VW7ATWQ2KZISv4k53Ecv+NZ2tcym5MOvDrwBLyKjZkCzvEQOH8mIGICkosBy0E8xTIwXpfkam+ZJiCvzAPQHrzIztxyEnkyI+0yW8/s0pJdngKybvlS0sLsQK99l3s/ZYPcPYkUoKUkAPd17ZJa3mbfwTA9QKq+y+5lVqbHbHINHDuoOnOXxIRt5m0A3BCNW7nByKYinlIp2MqdUCU5KupsuQwA6r12SiJhmABhLsBAfZoVbJkCn1b0IegruR+cKulPc2d+mF2JvEvOaLPHa8nOxmSX6neU6805mU2di69uMixy3WAKWBJVYPFEakKVC/CVBKROy/fvyDYwPeElJqXQP13vlyUtXxyW3k9N4qdJTaS52mvmI14s/pQnGUwBbEp+gM46zXOakSrwPR7JIhUoT7WF2YEXUuTq7QU7Nkr01CorQYE1s8c2HgF6sdtA/gxhaEBDTm98mcCsvQn/Y1XZ+/EdtDiR1Lr0wCcAAAAASUVORK5CYII=);
        }
    }
</style>

<template>
    <div id="nav-warp">
        <div id="nav-mobile" v-if="$store.getters.isMobile">
            手机
        </div>
        <div id="nav-pc" v-else>
            <div id="nav-box" class="container">
                <div class="row">
                    <div id="nav-left">
                        <router-link id="icon" to="/"></router-link>
                        <ul class="nav-left-ul">
                            <li>
                                <router-link class="nav-link" to="/post">帖子</router-link>
                            </li>
                            <li>
                                <router-link class="nav-link" to="/discuss">问答</router-link>
                            </li>
                            <li>
                                <router-link class="nav-link" to="/article">文章</router-link>
                            </li>
                        </ul>
                    </div>
                    <div id="nav-right">
                        <div v-if="$store.getters.isLogin">
                            已登录
                        </div>
                        <div v-else>
                            <button id="signIn">登录</button>
                            <button id="signUp">注册</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="nav-mask"></div>
            <navsign></navsign>
        </div>
    </div>
</template>

<script>

    import navsign from './nav-sign.vue'

    export default {
        components: {
            navsign
        },
        created () {

        },
        methods: {

        },
        mounted () {

        }
    }
</script>