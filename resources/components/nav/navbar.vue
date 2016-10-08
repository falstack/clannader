<style lang="sass" rel="scss">
    @import "../../static/sass/variables";

    .nav-bar {
        position: absolute;
        height: $nav-height;
        width: 100%;
        z-index: 100;

        .nav-icon {
            width: 120px;
            height: 16px;
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJYAAAAUCAMAAABYpzQDAAAAAXNSR0IArs4c6QAAAF1QTFRF////AAAA////////////////////////////////////////////////////////////////////////////////////////////////////////////bm5ubGxs9qS2NwAAABx0Uk5TIAAMFB4XDgkbEerRQ/ncdziuU+C+j4F+n7Gbbm+PKT8AAAJQSURBVEjHzdZtd7IwDAZgpuiU0Ep5Eeap/v+f+dxJWigOHdt5PpAvrjslXJKQmn08x2cSO8SR46yxRxw4TjHyMTJE/HwVebxMkhw43V4zy112u3jjbPL4GJti+SQ2w/LzeGJ98f8sWJeinFit75TVmy6wyOXZ1XRBQU4/sVH/GCS5qVeyPr1fdCkra4oSVyL5jFU1lgKrKOqEhdWMxRsDy/KFvQlZfmLB8Xg8xHO/3yeXsshqEW9FmbL64lqUyrItJSysZqxr0QWosk4nsmtZDBNV+riEdTH12Fspi6gqXGBVTZewwiqyZOOMVTVuBStIhDUro7C+2uMSqzTdqbWBhTrWEwvPp55Y2Ji1dsbChUhSGdzGcRnsDX/8kkVukXWzTKsDK5fCRVamZVTWYJlWz1g98uBF2e8rA9fFoiArn5Z/z0IduJAusqRwI0vLKCwtYBQmLHJcQ2Q8X0x3/E+s3simog6snAs3srSMYrnGjU+sqqmZhS9wRtb1LP+W1codSp5YyuLCTSwpo7C0rUoZZiMLL3Vpwm1+Yn2fXa9bHkklv6eRhe+dsLiMzMJG6XZPs5anA9otvol/Yi0OCHxdyT9w0yuLCzexdAVJHFnc9JGFZ3cIRfwz60jt93FKFCYQj67AQuESlqx4aOlKOn8cp4QcRNpb5SvWx3tWZeTwITz1yOpxrulRPdiJhVMmYfEKDR8OIpkT8fCxmsPFAfEb1vNR3XIRw2tFsUlybvrIynCniQWSi3M0NP0QmlyPahmn3esiLrq28jNwo79Ot8T6Bx2zbidNmDptAAAAAElFTkSuQmCC);
            background-repeat: no-repeat;
            background-size: contain;
            background-position: center;
            margin-right: 18px;
            padding: 10px 0;
        }

        .nav-link {
            color: #fff;
            padding: 5px 20px;
            border-radius: 10px;
            transition: .4s;
            margin: 0 5px;
            font-size: 13px;

            &:hover {
                background-color: #fff;
                color: $color-blue-hover;
                transition: 0s;
            }
        }

        .nav-box {
            height: 100%;
            z-index: 10;

            .row {
                height: 100%;
            }

            .nav-left, .nav-right {
                height: 100%;
                display: flex;
                align-items: center;
            }

            .nav-left {
                float: left;

                .nav-left-ul {
                    >li {
                        float: left;
                    }
                }
            }

            .nav-right {
                display: flex;
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
                }

                #signIn {
                    border: 1px solid #fff;
                    margin-left: 30px;

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

                #nav-user {
                    position: relative;
                    height: $nav-height;
                    padding: 0 30px;

                    .uface {
                        width: 36px;
                        height: 36px;
                        margin-top: ($nav-height - 36) / 2;
                    }

                    &:hover {
                        #user-table {
                            display: flex;
                        }
                    }

                    #user-table {
                        position: absolute;
                        top: $nav-height;
                        right: 15px;
                        text-align: left;
                        background: #fff;
                        width: 210px;
                        height: 82px;
                        display: none;
                        box-shadow: 0 5px 5px rgba(0,0,0,.2);
                        border-radius: 0 0 3px 3px;
                        flex-direction: column;
                        font-size: 14px;

                        &:hover {
                            display: flex;
                        }

                        .card {
                            flex: 1;
                            padding: 15px;
                        }

                        .bottom {
                            height: 32px;
                            line-height: 32px;
                            justify-content: flex-end;
                            padding: 0 15px;
                            text-align: right;
                            background-color: $color-gray-hover;
                        }
                    }
                }
            }
        }
    }

    .nav-mask {
        width: 100%;
        height: 100px;
        position: absolute;
        left: 0;
        top: 0;
        z-index: 5;
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAABkCAYAAABOx/oaAAAAAXNSR0IArs4c6QAAAX5JREFUSA2llAtuwzAMQ5NtN9r9r9bUZP0I2VW7ATWQ2KZISv4k53Ecv+NZ2tcym5MOvDrwBLyKjZkCzvEQOH8mIGICkosBy0E8xTIwXpfkam+ZJiCvzAPQHrzIztxyEnkyI+0yW8/s0pJdngKybvlS0sLsQK99l3s/ZYPcPYkUoKUkAPd17ZJa3mbfwTA9QKq+y+5lVqbHbHINHDuoOnOXxIRt5m0A3BCNW7nByKYinlIp2MqdUCU5KupsuQwA6r12SiJhmABhLsBAfZoVbJkCn1b0IegruR+cKulPc2d+mF2JvEvOaLPHa8nOxmSX6neU6805mU2di69uMixy3WAKWBJVYPFEakKVC/CVBKROy/fvyDYwPeElJqXQP13vlyUtXxyW3k9N4qdJTaS52mvmI14s/pQnGUwBbEp+gM46zXOakSrwPR7JIhUoT7WF2YEXUuTq7QU7Nkr01CorQYE1s8c2HgF6sdtA/gxhaEBDTm98mcCsvQn/Y1XZ+/EdtDiR1Lr0wCcAAAAASUVORK5CYII=);
    }

    .nav-gray {
        background-color: rgba(0,0,0,.2);
        box-shadow: 0 1px 2px rgba(0,0,0,.1);

        .nav-mask {
            display: none;
        }
    }

    .nav-white {
        background-color: #fff;
        box-shadow: 0 0 4px rgba(0,0,0,.2);

        .nav-mask {
            display: none;
        }

        .nav-link {
            color: #333;
        }

        .nav-icon {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJYAAAAUCAYAAABvecQxAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyNpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDE0IDc5LjE1MTQ4MSwgMjAxMy8wMy8xMy0xMjowOToxNSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIChNYWNpbnRvc2gpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkY3RkQ5ODAzNDBCQzExRTZBMjBFQ0I4MDU5REVGMTBDIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOkY3RkQ5ODA0NDBCQzExRTZBMjBFQ0I4MDU5REVGMTBDIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6RjdGRDk4MDE0MEJDMTFFNkEyMEVDQjgwNTlERUYxMEMiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6RjdGRDk4MDI0MEJDMTFFNkEyMEVDQjgwNTlERUYxMEMiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz46aqYfAAAEN0lEQVR42uxaXUgUURTeNQlKyAgCg6TMIB/CQCkqDSM0kIqSfAiUUHyQCFmCKOghUBBCQloERSEzyiCoB0nroRB96AfCJAsx8ieydCGKDOop3c6Fb+p2m5n7szu7a8yBD70799w5c+ebe757ZoLRaDQQqwWDwVWaLiuEdppCH7djdn3TDeJwMjG+JYX4vTR2/kVJn58Ovy8q/ub0+5LER3nyLfKoMHB1wDffVJ80RVIx+wH45hPLnVAapBIJFovdIHwR8FzoU0cYJ+zQHPcD4axLnxrCW8IZyVj3CFe4di3hDSEk8esjtLoc7ybMSMZpxHWImCbsTlliMc1kSKhYybWOMEbYQyhF28J7EOyiYTzZhC2EKcIBSd8FQhVhp+Y5LL9CwxizNGJkfTYKaCbcIowStieTWOkyUrS1tQWt/xsaGv4hWzgc/n08FApFbcbR0V19EJ1bbYT1cUILbly/wbUeRCwdhFOEPKxMdvYNRGYkPqJxDt7vqEGM5YixlyPoiIb/VeA+oZNQlLIai5HJIhRPMp5UjFA2pNI162afd+lzjrCN8NJgfEbMecIDtE9L+l8gZCqkRCe/kEGMxxDjbbSrDOeyHotGR8oQyykF2q1WDquUaUrcS3hMeOjBdeYBg4RZwmtCvsRnDnpHN7VFCNcN/HK5GCOKMTrZLPSW6J9D+Ej4xKFL6NMCPduC1M7Q48muMEG2mfDVo7FPYLIvo90MzSXTUD24wbq67pqBXzViDAsxmuq1IcIaTmuxVWyY0E5YDzAtewjp07JJ/D1JqMTqW5OqxEpmCYLdnDJsCiybAFRSjWlq0/HLwg0eE8S5aoyqUmAAhOVJxMhfTCgQ5qw9luyRSiuWV8ZE+wZChbA1z8eEylatOcPUppMSy0HCCpQaLFgxFsY4BzkYv9fm2DAe/MPC7rY/lhMmkljJWrX2I8WIW/NSTHaxR6lNx28fYswRoBOj3UptWQYerjuCvmJ4StiU8F2hm4CPw06Qt3eEtR6I9iIIY9FYmlmpUC/yOiXmusQ4pRmjOO48iG1ZJaeveLA6YVPSiOWxPcEEl8VZtC/gyXcS53kBtUIon9p0CqeylFiNGCslMRYaPFCDaH8HyVKnjpVA68Aq4lZfYltg9tpE9TXOLkzohMPxzsCfarlXuz2ZXwFiHIlTjMxacc2X0J7BGHbnZ8XoUUG8x59Y0Wg0mERy1eNJm7S50CFsgVkhVaVAWocnt0kizAc060VWasswTIm8X61CjBGNGOtQv8rApoW3uzhXl0AqJt5fAMtyxVJ5tTOOnM8E5aPA3y+hP2NbPsj1z0S/iIBX2F4zQfxMcs6bELqqFXY2frcgjnVSYraNaB9RjDEkaCjxJXQjygQlDitfCcoavHBvByHjakGnD/3i8BLajVT+h36x2fL90E8nJRp8Qerbf25p/hT45oX9EmAAtKw3FMQYVDwAAAAASUVORK5CYII=);
        }

        .nav-more {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyNpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDE0IDc5LjE1MTQ4MSwgMjAxMy8wMy8xMy0xMjowOToxNSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIChNYWNpbnRvc2gpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjFDMEVBODc5NDBDMDExRTY4NjhDQjBBNTYyRTc0QTM4IiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjFDMEVBODdBNDBDMDExRTY4NjhDQjBBNTYyRTc0QTM4Ij4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6MUMwRUE4Nzc0MEMwMTFFNjg2OENCMEE1NjJFNzRBMzgiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6MUMwRUE4Nzg0MEMwMTFFNjg2OENCMEE1NjJFNzRBMzgiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz43nWKXAAAAv0lEQVR42uzWQQrCMBAFUOMJ6snNDaw39AYxA12VChZjUugbmM3wyeI1E5pKKZczVwIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMAp6tpEMaWp9qN2Wfoes1H5XRU34NeuNcdRq86j8nu6yQrEV9kYv+rZtxH57ivwyeVg+b8CPDdm88B89zdgWu1pjlnjfP423/0N8B8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACAo9dbgAEA3Mf5yjHDzskAAAAASUVORK5CYII=);
        }
    }
</style>

<template>
    <div :class="['nav-bar', navstyle.gray ? 'nav-gray' : navstyle.white ? 'nav-white' : '']">
        <div class="container nav-box">
            <div class="row">
                <div class="nav-left">
                    <router-link class="nav-icon" to="/"></router-link>
                    <ul class="nav-left-ul">
                        <li>
                            <router-link class="nav-link" to="/posts">帖子</router-link>
                        </li>
                        <!--<li>-->
                            <!--<router-link class="nav-link" to="/discuss">问答</router-link>-->
                        <!--</li>-->
                        <!--<li>-->
                            <!--<router-link class="nav-link" to="/article">文章</router-link>-->
                        <!--</li>-->
                    </ul>
                    <navmsg></navmsg>
                </div>
                <div class="nav-right">
                    <navsearch></navsearch>
                    <div v-if="$store.getters.isLogin" id="nav-user">
                        <router-link class="uface" :to="'/people/' + user.home"><img :src="user.face"></router-link>
                        <div id="user-table">
                            <div class="card">
                                <router-link :to="'/people/' + user.home">{{ user.name }}</router-link>
                            </div>
                            <div class="bottom">
                                <a @click="logout">退出</a>
                            </div>
                        </div>
                    </div>
                    <div v-else>
                        <button id="signIn" @click="$root.$refs.navsign.showLogin()">登录</button>
                        <button id="signUp" @click="$root.$refs.navsign.showRegister()">注册</button>
                    </div>
                    <creator></creator>
                </div>
            </div>
        </div>
        <div class="nav-mask"></div>
    </div>
</template>

<script>

    import { clearUserInfo } from '../../static/js/storage'
    import navsearch from './nav-search.vue'
    import navmsg from './nav-msg.vue'
    import creator from './nav-creator.vue'

    export default {
        components: {
            navsearch, navmsg, creator
        },
        data () {
            return {
                user : {
                    name : "",
                    zone : "",
                    face : ""
                },
                navstyle : {
                    gray : false,
                    white : false
                }
            }
        },
        created () {
            if (this.$store.getters.isLogin) {
                this.makeLogin()
            }
        },
        methods: {
            makeLogin () {
                this.user.name = this.$getUserInfo('name');
                this.user.face = this.$getUserInfo('avatar');
                this.user.home = this.$getUserInfo('zone');
            },
            logout () {
                this.$http.get('/door/logout').then(() => {
                    var bool = false;
                    this.$store.dispatch('setLogin', { bool });
                    clearUserInfo();
                    document.getElementById('_auth').setAttribute('content', 0);
                    this.$root.$refs.toast.open({
                        theme: "success",
                        content: "已退出登录！"
                    });
                });
            },
            grayStyle () {
                this.navstyle.gray = true;
                this.navstyle.white = false;
            },
            whiteStyle () {
                this.navstyle.white = true;
                this.navstyle.gray = false;
            },
            normalStyle () {
                this.navstyle.white = false;
                this.navstyle.gray = false;
            }
        }
    }
</script>