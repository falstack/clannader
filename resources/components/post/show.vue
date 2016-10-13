<style lang="sass" rel="scss" scoped>


</style>

<template>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <p>{{ post.title }}</p>
                <div>
                    <like :type="'Post'" :me="post.isMe" :id="$route.params.id" :count="post.like" :flag="post.hasLike"></like>
                </div>
                <comment :type="'Post'" :master="post.uHome" :id="$route.params.id"></comment>
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