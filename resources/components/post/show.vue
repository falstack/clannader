<style lang="sass" rel="scss" scoped>
    #post {
        margin: 25px 0;

        .head {
            margin-bottom: 5px;

            .title {
                font-size: 18px;
                font-weight: 700;
                margin-bottom: 25px;
            }

            .info {
                display: flex;
                justify-content: space-between;
                align-items: center;

                >div {
                    display: flex;
                    align-items: center;
                }

                .uface, .bface {
                    width: 30px;
                    height: 30px;
                }
            }
        }

        .foot {
            margin: 30px 0;
            text-align: right;
        }
    }

</style>

<template>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div id="post">
                    <div class="head">
                        <p class="title">{{ post.title }}</p>
                        <div class="info">
                            <div>
                                <router-link class="uface" :to="'/people/' + post.uHome"><img :src="post.uFace"></router-link>
                                <span class="dot"></span>
                                <router-link :to="'/people/' + post.uHome">{{ post.uName }}</router-link>
                            </div>
                            <div>
                                <span class="gray-word">{{ post.time }}</span>
                                <span class="dot"></span>
                                <router-link class="bface" :to="'/bangumi/' + post.bHome"><img :src="post.bFace"></router-link>
                            </div>
                        </div>
                    </div>
                    <div class="article" v-html="post.content">
                    </div>
                    <div class="foot">
                        <like :type="'Post'" :me="post.isMe" :id="$route.params.id" :count="post.like" :flag="post.hasLike"></like>
                    </div>
                </div>
                <comment :type="'Post'" :rich="true" :master="post.uHome" :id="$route.params.id"></comment>
            </div>
        </div>
    </div>
</template>

<script lang="babel">

    import comment from '../vue-input/comment.vue'
    import like from '../vue-input/like.vue'

    export default {
        components: {
            comment, like
        },
        watch: {
            '$route' () {
                this.getPost();
            }
        },
        data () {
            return {
                post : {}
            }
        },
        beforeCreate () {
            this.$root.$data.load = true;
        },
        created () {
            this.getPost();
        },
        methods: {
            getPost () {
                this.$http.post('/api/post/show', {
                    id : this.$route.params.id
                }).then((res) => {
                    this.post = res.body.data;
                }, (res) => {
                    if (res.status === 500) {
                        this.$router.replace({ path: '/door/404' });
                        this.$root.$refs.toast.open({
                            theme: "warning",
                            content: "帖子不存在！"
                        });
                    } else {
                        this.$root.$refs.toast.open({
                            theme: "error",
                            content: "服务器异常，获取数据失败！"
                        });
                    }
                });
            }
        }
    }
</script>