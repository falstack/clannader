<style lang="sass" rel="scss" scoped>

    $banner-height: 400px;

    #banner {
        height: 400px;
        position: relative;
        width: 100%;
        overflow: hidden;
        box-shadow: inset 0 0 15px 0 rgba(0,0,0,.5);
        z-index: 1;

        .img {
            height: $banner-height;
            width: 110%;
            position: absolute;
            top: 50%;
            left: 50%;
            margin: -$banner-height / 2 -55%;
            -webkit-filter: blur(5px);
            -moz-filter: blur(5px);
            -ms-filter: blur(5px);
            filter: blur(5px);
            filter: progid:DXImageTransform.Microsoft.Blur(PixelRadius=5, MakeShadow=false);
            background-position: 50%;
            background-size: cover;
            background-repeat: no-repeat;
            z-index: -1;
        }
    }

    #info {
        position: absolute;
        width: 100%;
        height: $banner-height;
        color: #fff;
        text-shadow: 0 1px 10px #000;
        z-index: 5;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;

        .title {
            margin: 20px 0;
        }

        .summary {
            margin-bottom: 20px;
            max-width: 800px;
            font-size: 13px;

            p {
                text-indent: 2em;
            }
        }
    }
</style>

<template>
    <div class="template-warp">
        <div id="banner">
            <div class="img" ref="banner"></div>
        </div>
        <div id="info">
            <h1 class="title">{{ info.name }}</h1>
            <div class="summary" v-html="info.summary">
            </div>
            <button class="btn-cap btn-pink" @click="followBangumi">{{ info.hasLike ? '已关注' : '关注' }}</button>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <paginate :template="template" :init="init"></paginate>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import paginate from '../vue-input/paginate.vue'

    export default {
        components : {
            paginate
        },
        data () {
            return {
                info : {},
                template:
                "<div class='post-item' v-for='item in orderFilter'>" +
                    "<div class='head'>" +
                        "<div>" +
                            "<router-link class='uface' :to=\" '/people/' + item.uHome \"><img :src='item.uFace'></router-link>" +
                            "<router-link class='gray-link' :to=\" '/people/' + item.uHome \">{{ item.uName }}</router-link>" +
                            "<span class='dot'></span>" +
                            "<router-link class='blue-link title' :to=\" '/post/' + item.id \">{{ item.title }}</router-link>" +
                        "</div>" +
                    "</div>" +
                    "<div class='body'>" +
                        "<p v-html='postFilter(item.content)'></p>" +
                    "</div>" +
                    "<div class='foot'>" +
                        "<span class='gray-word'>{{ item.time }}</span>" +
                        "<span class='dot'></span>" +
                        "<span class='gray-word'>回复{{ item.talk }}</span>" +
                        "<span class='dot'></span>" +
                        "<span class='gray-word'>喜欢{{ item.like }}</span>" +
                    "</div>" +
                "</div>",
                init : {
                    id : this.$route.params.id,
                    limit : 5,
                    type : 'Bangumi',
                    api : '/api/post/list'
                }
            }
        },
        watch: {
            '$route' () {
                this.getBangumiInfo();
            },
            '$store.getters.isLogin' () {
                this.getBangumiInfo();
            }
        },
        beforeCreate () {
            this.$root.$data.load = true;
            this.$root.$refs.navbar.grayStyle();
            this.$root.$refs.banner.hidden();
        },
        created () {
            this.getBangumiInfo();
        },
        methods: {
            getBangumiInfo () {
                this.$http.post('/api/bangumi/info', {
                    id : this.$route.params.id
                }).then((res) => {
                    this.info = res.body.data;
                    this.$refs.banner.style.backgroundImage = 'url(' + this.info.banner + ')';
                }, (res) => {
                    if (res.status === 500) {
                        this.$router.replace({ path: '/door/404' });
                        this.$root.$refs.toast.open({
                            theme: "warning",
                            content: "不存在的番剧！"
                        });
                    } else {
                        this.$root.$refs.toast.open({
                            theme: "error",
                            content: "服务器异常，获取帖子数据失败！"
                        });
                    }
                });
            },
            followBangumi (el) {
                if (this.$store.getters.isLogin) {
                    var btn = el.currentTarget;
                    btn.setAttribute('disabled', 'disabled');
                    this.$http.post('/api/like', {
                        id : this.$route.params.id,
                        type : 'Bangumi'
                    }).then(() => {
                        this.info.hasLike = !this.info.hasLike;
                        if (this.info.hasLike) {
                            this.$root.$refs.toast.open({
                                theme: "success",
                                content: "关注成功！"
                            });
                        } else {
                            this.$root.$refs.toast.open({
                                theme: "success",
                                content: "已取消关注！"
                            });
                        }
                        btn.removeAttribute('disabled');
                    }, () => {
                        this.$root.$refs.toast.open({
                            theme: "error",
                            content: "服务器异常，发送数据失败！"
                        });
                        btn.removeAttribute('disabled');
                    });
                } else {
                    this.$root.$refs.navsign.showLogin()
                }
            },
            getBangumiPost () {
                this.$http.get('/api/post/bangumi', { params : {
                    id : this.$route.params.id
                }}).then((res) => {
                    // success callback
                }, () => {
                    this.$root.$refs.toast.open({
                        theme: "error",
                        content: "服务器异常，获取数据失败！"
                    });
                });
            }
        },
        destroyed () {
            this.$root.$refs.navbar.normalStyle();
            this.$root.$refs.banner.show();
        }
    }
</script>