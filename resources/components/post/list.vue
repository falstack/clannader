<style lang="sass" rel="scss" scoped>
    @import "../../static/sass/variables";

    #post-list {
        margin-top: 20px;

        .post-item {
            min-height: 80px;
            border-top: 1px solid $color-gray-hover;
            background-color: #fff;
            transition: background-color .2s;
            padding: 10px 20px;
            display: flex;
            flex-direction: column;

            &:first-child {
                border-top: none;
            }

            &:hover {
                transition: 0s;
                background-color: $color-gray-light;
            }

            .head {
                display: flex;
                justify-content: space-between;
                margin-bottom: 10px;

                >div {
                    display: flex;
                    align-items: center;
                }

                .uface, .bface {
                    width: 38px;
                    height: 38px;
                }

                .gray-link {
                    margin-left: 5px;
                    font-size: 13px;
                }
            }

            .foot {
                margin-top: 10px;
                display: flex;
                justify-content: flex-end;
            }
        }
    }
</style>

<template>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div id="post-list">
                    <div class="post-item" v-for="post in post.data">
                        <div class="head">
                            <div>
                                <router-link class="uface" :to=" '/people/' + post.uHome "><img :src="post.uFace"></router-link>
                                <router-link class="gray-link" :to=" '/people/' + post.uHome ">{{ post.uName }}</router-link>
                                <span class="dot"></span>
                                <router-link class="blue-link title" :to=" '/post/' + post.id ">{{ post.title }}</router-link>
                            </div>
                            <router-link class="bface" :to=" '/bangumi/' + post.bHome "><img :src="post.bFace"></router-link>
                        </div>
                        <div class="body">
                            <p class="oneline">{{ post.content }}</p>
                        </div>
                        <div class="foot">
                            <span class="gray-word">{{ post.time }}</span>
                            <span class="dot"></span>
                            <span class="gray-word">回复{{ post.talk }}</span>
                            <span class="dot"></span>
                            <span class="gray-word">喜欢{{ post.like }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>
</template>

<script lang="babel">

    export default {
        data () {
            return {
                take : 10,
                post : {
                    data : [],
                    offset : 0
                }
            }
        },
        created () {
            this.getPost();
        },
        methods: {
            getPost () {
                this.$http.get('/api/post/all', { params : {
                    take : this.take,
                    offset : this.post.offset
                }}).then((res) => {
                    this.post.data = res.body.data;
                    this.post.offset++;
                }, (res) => {
                    if (res.status === 500) {
                        this.$root.$refs.toast.replace({
                            theme: "warning",
                            content: "文章不存在！"
                        });
                    } else {
                        this.$root.$refs.toast.open({
                            theme: "error",
                            content: "服务器异常，获取帖子数据失败！"
                        });
                    }
                });
            }
        }
    }
</script>