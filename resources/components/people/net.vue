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
                "<div class='user-item' v-for='item in orderFilter'>" +
                    "<router-link class='uface' :to='\"/people/\" + item.uHome'><img :src='item.uFace'></router-link>" +
                    "<router-link class='gray-link oneline' :to='\"/people/\" + item.uHome'>{{ item.uName }}</router-link>" +
                "</div>",
                init : {
                    id : this.$route.params.id,
                    limit : 20,
                    api : '/api/people/pink',
                    sorts : [],
                    words : "人"
                }
            }
        }
    }
</script>