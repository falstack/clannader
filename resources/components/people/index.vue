<style lang="sass" rel="scss" scoped>

    @import "../../static/sass/variables";

    .zone-banner {
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }

    .pc-banner {
        height: 340px;
    }

    .m-banner {
        height: 200px;
    }

    .zone-left {
        padding-right: 60px;
        margin-top: -50px;

        .user-card {
            button {
                margin-left: 10px;
            }
        }

        .uface {
            width: 100px;
            height: 100px;
            margin-left: 6px;
            border: 4px solid #fff;
        }

        .uname {
            margin: 20px 0;

            .oneline {
                font-size: 20px;
                line-height: 32px;
                letter-spacing: 2px;
                color: #666;
                margin-left: 10px;
                vertical-align: middle;
                font-weight: bold;
            }

            .sex {
                width: 13px;
                height: 13px;
                margin-left: 5px;
            }
        }

        .uword {
            color: #aaa;
            margin: 20px 0 0;
            font-size: 12px;
            margin-left: 10px;
            line-height: 1.7;
        }

        .user-menu {
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid #eee;

            li {
                &:hover {
                    background-color: $color-gray-light;
                }
            }

            a {
                display: block;
                color: #999;
                font-size: 12px;
                padding: 5px 0;
                margin-left: 10px;

                &:hover {
                    color: $color-blue;
                }
            }

            .router-link-active {
                color: $color-blue-deep;

                &:hover {
                    color: $color-blue-deep;
                }
            }
        }
    }

    .zone-right {
        margin-top: 20px;
        margin-bottom: 30px;
    }

    .m-zone-head {
        position: relative;
        margin: 0 15px;
        padding-left: 70px;
        height: 25px;

        .uface {
            width: 60px;
            height: 60px;
            position: absolute;
            left: 0;
            top: -35px;
            border: 2px solid #fff;
        }

        .uname {
            position: absolute;
            left: 70px;
            top: -30px;
            display: flex;
            align-items: center;
            color: #fff;
            text-shadow: 0 1px 10px #000;
            font-weight: 700;

            .sex {
                width: 14px;
                height: 14px;
                margin-left: 5px;
            }
        }

        .uword {
            line-height: 25px;
        }
    }

    .menu-bar {
        margin-top: 5px;
        width: 100%;
        height: 40px;
        margin-bottom: 5px;

        li {
            width: 25%;
            height: 100%;
            text-align: center;
            line-height: 40px;
            float: left;

            &:hover {
                background-color: $color-gray-hover;
            }
        }

        a {
            display: block;
            width: 100%;
            height: 100%;
        }
    }
</style>

<template>
    <div>
        <div :class="[ 'zone-banner', $root.$data.isMobile ? 'm-banner' : 'pc-banner' ]" ref="banner"></div>
        <div class="container">
            <div class="row">
                <div class="m-zone-head" v-if="$root.$data.isMobile">
                    <router-link class="uface" :to="'/people/' + people.uHome"><img :src="people.uFace"></router-link>
                    <div class="uname">
                        <span class="oneline">{{ people.uName }}</span>
                        <span :class="['sex', $getSexClass(people.sex)]"></span>
                    </div>
                    <p class="uword oneline">{{ people.uWord }}</p>
                </div>
                <ul class="menu-bar" v-if="$root.$data.isMobile">
                    <li v-for="item in column">
                        <router-link :to="'/people/' + $route.params.id + item.path">{{ item.name }}</router-link>
                    </li>
                    <li v-for="item in myColumn" v-if="people.isMe">
                        <router-link :to="'/people/' + $route.params.id + item.path">{{ item.name }}</router-link>
                    </li>
                </ul>
                <div class="col-md-3 zone-left" v-else>
                    <div class="user-card">
                        <router-link class="uface" :to="'/people/' + people.uHome"><img :src="people.uFace"></router-link>
                        <div class="uname">
                            <span class="oneline">{{ people.uName }}</span>
                            <span :class="['sex', $getSexClass(people.sex)]"></span>
                        </div>
                        <button v-if="!people.isMe" @click="pink">{{ people.hasLike ? '已关注' : '关注' }}</button>
                        <p class="uword">{{ people.uWord }}</p>
                    </div>
                    <ul class="user-menu">
                        <li v-for="item in column">
                            <router-link :to="'/people/' + $route.params.id + item.path">{{ item.name }}</router-link>
                        </li>
                        <li v-for="item in myColumn" v-if="people.isMe">
                            <router-link :to="'/people/' + $route.params.id + item.path">{{ item.name }}</router-link>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9 zone-right">
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="babel">

    export default {
        watch: {
            '$route' () {
                this.getPeopleInfo();
            },
            '$store.getters.isLogin' () {
                this.getPeopleInfo();
            }
        },
        data () {
            return {
                people : {},
                column : [
                    {
                        name : "番组",
                        path : "/bangumi"
                    },
                    {
                        name : "帖子",
                        path : "/post"
                    },
                    {
                        name : "朋友圈",
                        path : "/net"
                    }
                ],
                myColumn : [
//                    {
//                        name : "收件箱",
//                        path : "/inbox"
//                    },
                    {
                        name : "个人资料",
                        path : "/edit"
                    }
                ]
            }
        },
        beforeCreate () {
            this.$root.$data.load = false;
        },
        created () {
            this.getPeopleInfo();
        },
        methods: {
            getPeopleInfo () {
                this.$http.post('/api/people/info', {
                    id : this.$route.params.id
                }).then((res) => {
                    this.people = res.body.data;
                    this.$refs.banner.style.backgroundImage = 'url(' + this.people.banner + ')';
                    document.title = this.people.uName + ' - CLANNADer'
                }, (res) => {
                    if (res.status === 500) {
                        this.$router.replace({ path: '/door/404' });
                        this.$root.$refs.toast.open({
                            theme: "warning",
                            content: "该用户不存在！"
                        });
                    } else {
                        this.$root.$refs.toast.open({
                            theme: "error",
                            content: "服务器异常，获取数据失败！"
                        });
                    }
                });
            },
            pink (e) {
                if (this.$store.getters.isLogin) {
                    if (this.people.isMe) {
                        this.$root.$refs.toast.open({
                            theme: "warning",
                            content: "不能关注你自己！"
                        });
                    } else {
                        var btn = e.currentTarget;
                        btn.setAttribute('disabled', 'disabled');
                        this.$http.post('/api/like', {
                            id : this.$route.params.id,
                            type : 'User'
                        }).then(() => {
                            this.people.hasLike ? this.people.like-- : this.people.like++;
                            this.people.hasLike = !this.people.hasLike;
                            btn.removeAttribute("disabled");
                        }, () => {
                            this.$root.$refs.toast.open({
                                theme: "error",
                                content: "服务器异常，发送数据失败！"
                            });
                        });
                    }
                } else {
                    this.$root.$refs.navbar.showLogin();
                }
            }
        }
    }
</script>