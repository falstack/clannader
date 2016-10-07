<style lang="sass" rel="scss" scoped>
    @import "../static/sass/variables";

    #index-pc {
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

                >div {
                    display: flex;
                    align-items: center;
                }

                .uface, .bface {
                    width: 24px;
                    height: 24px;
                }

                .title {
                    margin-left: 10px;
                }
            }
        }
    }
</style>

<template>
    <div>
        <div id="index-mobile" v-if="$root.$data.mobile">

        </div>
        <div id="index-pc" v-else>
            <div class="col-md-9">
                <div class="post-item" v-for="post in post.data">
                    <div class="head">
                        <div>
                            <router-link class="uface" :to=" '/people/' + post.uHome "><img :src="post.uFace"></router-link>
                            <router-link class="blue-link title" :to=" '/post/' + post.id ">{{ post.title }}</router-link>
                        </div>
                        <router-link class="bface" :to=" '/bangumi/' + post.bid "><img :src="post.bFace"></router-link>
                    </div>
                    <div class="body">
                        <p class="oneline">{{ post.content }}</p>
                    </div>
                    <div class="foot">
                        <span>{{ $diffForHumans(post.time) }}</span>
                        <span>回复{{ post.talk }}</span>
                        <span>喜欢{{ post.like }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>
</template>

<script>

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
            this.getLatestPost();
        },
        methods: {
            getLatestPost () {
                this.$http.get('/api/post/news', { params : {
                    take : this.take,
                    offset : this.post.offset
                }}).then((res) => {
                    this.post.data = res.body.data;
                    this.post.offset++;
                }, () => {
                    this.$root.$refs.toast.open({
                        theme: "error",
                        content: "服务器异常，获取帖子数据失败！"
                    });
                });
            }
        }
    }
</script>