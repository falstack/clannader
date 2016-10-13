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
        props: {

        },
        watch: {

        },
        computed: {

        },
        data () {
            return {
                template:
                "<div class='bangumi-item'>" +
                    "<router-link class='bface' :to='\"/bangumi/\" + item.id'><img :src='item.avatar'></router-link>" +
                    "<router-link class='gray-link oneline' :to='\"/bangumi/\" + item.id'>{{ item.name }}</router-link>" +
                "</div>",
                init : {
                    id : this.$route.params.id,
                    limit : 20,
                    type : 'User',
                    api : '/api/bangumi/list',
                    sorts : [],
                    words : "部"
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