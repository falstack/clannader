<style lang="sass" rel="scss" scoped>

</style>

<template>
    <paginate :template="template" :init="init"></paginate>
</template>

<script>

    import paginate from '../vue-input/paginate.vue'

    export default {
        components: {
            paginate
        },
        data () {
            return {
                template:
                "<div class='post-item' v-for='item in orderFilter'>" +
                    "<div class='head'>" +
                        "<router-link class='blue-link title' :to=\" '/post/' + item.id \">{{ item.title }}</router-link>" +
                        "<router-link class='bface' :to=\" '/bangumi/' + item.bHome \"><img :src='item.bFace'></router-link>" +
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
                    type : 'User',
                    api : '/api/post/list'
                }
            }
        },
        created () {

        },
        methods: {

        },
        mounted () {

        }
    }
</script>