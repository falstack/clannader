<style lang="sass" rel="scss" scoped>

</style>

<template>
    <div>
        <div class="col-md-9">
            <p>{{ post.title }}</p>
            <comment :type="'Post'" :master="post.uHome" :id="$route.params.id"></comment>
        </div>
    </div>
</template>

<script>

    import comment from '../vue-input/comment.vue'

    export default {
        components: {
            comment
        },
        props: {

        },
        computed: {

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
                }, () => {
                    this.$root.$refs.toast.open({
                        theme: "error",
                        content: "服务器异常，获取数据失败！"
                    });
                });
            }
        },
        mounted () {

        }
    }
</script>