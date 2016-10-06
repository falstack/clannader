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
                justify-content: flex-start;
                align-items: center;

                .face {
                    width: 24px;
                    height: 24px;
                    margin-right: 10px;
                }
            }
        }
    }
</style>

<template>
    <div>
        <div id="index-mobile" v-if="$store.getters.isMobile">

        </div>
        <div id="index-pc" v-else>
            <div class="col-md-9">
                <div class="post-item" v-for="post in post.data">
                    <div class="head">
                        <router-link class="face" :to=" '/people/' + post.userHome "><img :src="post.userFace"></router-link>
                        <router-link class="blue-link" :to=" '/post/' + post.id ">{{ post.title }}</router-link>
                    </div>
                    <div class="body">
                        <p class="oneline">{{ post.content }}</p>
                    </div>
                    <div class="foot">
                        <span>{{ $diffForHumans(post.created_at) }}</span>
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
        },
        mounted () {

        }
    }
</script>