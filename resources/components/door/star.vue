<style lang="sass" rel="scss" scoped>

</style>

<template>
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="col-md-12">
                    <paginate :init="init" :template="template"></paginate>
                </div>
            </div>
        </div>
    </div>
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
                "<div class='bangumi-star' v-for='item in orderFilter'>" +
                    "<router-link class='bface' :to='\"/bangumi/\" + item.id'><img :src='item.avatar'></router-link>" +
                    "<div class='info'>" +
                        "<router-link class='gray-link oneline' :to='\"/bangumi/\" + item.id'>{{ item.name }}</router-link>" +
                        "<button :class=\"[ 'btn-bean', item.hasLike ? 'btn-gray' : 'btn-blue' ]\" @click='$parent.follow($event, item)'>{{ item.hasLike ? '已关注' : '关注' }}</button>" +
                    "</div>" +
                "</div>",
                init : {
                    limit : 20,
                    api : '/api/bangumi/list',
                    sorts : [],
                    words : "部",
                    isGet : false
                }
            }
        },
        beforeCreate () {
            this.$root.$data.load = true;
        },
        created () {
            document.title = '番剧列表 - CLANNADer'
        },
        methods: {
            follow (el, item) {
                if (this.$store.getters.isLogin) {
                    var btn = el.currentTarget;
                    btn.setAttribute('disabled', 'disabled');
                    this.$http.post('/api/like', {
                        id : item.id,
                        type : 'Bangumi'
                    }).then(() => {
                        item.hasLike = !item.hasLike;
                        if (item.hasLike) {
                            this.$root.$refs.toast.open({
                                theme: "success",
                                content: "关注成功！"
                            });
                        } else {
                            this.$root.$refs.toast.open({
                                theme: "success",
                                content: "已取消关注！"
                            });
                        }
                        btn.removeAttribute('disabled');
                    }, () => {
                        this.$root.$refs.toast.open({
                            theme: "error",
                            content: "服务器异常，发送数据失败！"
                        });
                        btn.removeAttribute('disabled');
                    });
                } else {
                    this.$root.$refs.navsign.showLogin()
                }
            }
        }
    }
</script>