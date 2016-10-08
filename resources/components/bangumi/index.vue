<style lang="sass" rel="scss" scoped>

    $banner-height: 400px;

    #banner {
        height: 400px;
        position: absolute;
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

            </div>
        </div>
    </div>
</template>

<script>

    export default {
        components: {

        },
        route: {
            canReuse (transition) {
                return transition.to.path.split('/')[2] === transition.from.path.split('/')[2];
            }
        },
        data () {
            return {
                info : {}
            }
        },
        created () {
            this.$root.$refs.banner.hidden();
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
                    console.log(res.body);
                });
            },
            followBangumi (el) {
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
            this.$root.$refs.banner.show();
        }
    }
</script>