<template>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <paginate :template="template" :init="init"></paginate>
            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>
</template>

<script lang="babel">

    import paginate from '../vue-input/paginate.vue'

    export default {
        components : {
            paginate
        },
        data () {
            return {
                template:
                    "<div class='post-item' v-for='item in orderFilter'>" +
                        "<div class='head'>" +
                            "<div>" +
                                "<router-link class='uface' :to=\" '/people/' + item.uHome \"><img :src='item.uFace'></router-link>" +
                                "<router-link class='gray-link' :to=\" '/people/' + item.uHome \">{{ item.uName }}</router-link>" +
                                "<span class='dot'></span>" +
                                "<router-link class='blue-link title' :to=\" '/post/' + item.id \">{{ item.title }}</router-link>" +
                            "</div>" +
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
                    api : '/api/post/list'
                }
            }
        },
        beforeCreate () {
            this.$root.$data.load = true;
        },
        created () {
            document.title = '帖子列表 - CLANNADer'
        }
    }
</script>