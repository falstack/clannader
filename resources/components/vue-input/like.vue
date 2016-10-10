<style lang="sass" rel="scss" scoped>
    @import '../../static/sass/variables';

    .btn-likeable {
        position: relative;
        height: 36px;
        line-height: 34px;
        padding-left: 35px;
        padding-right: 18px;
        text-align: center;
        border-radius: 4px;
        font-size: 13px;

        &:before {
            content: '\2665';
            position: absolute;
            left: 15px;
            transform: scale(1.3, 1);
        }
    }

    .btn-nolike {
        background-color: transparent;
        border: 1px solid $color-pink;
        color: $color-pink;

        &:hover {
            background-color: rgba(253, 143, 179, .125);
        }
    }

    .btn-liked {
        background-color: $color-pink;
        border: 1px solid $color-pink;
        color: #fff;

        &:hover {
            background-color: #fff;
            color: $color-pink;
        }
    }
</style>

<template>
    <button :class="['btn-likeable', flag ? 'btn-liked' : 'btn-nolike']" @click="submit">{{ count }}</button>
</template>

<script>

    export default {
        props: {
            type : {
                required : true,
                type : String
            },
            flag : {
                required : true,
                type : Boolean
            },
            count : {
                required : true,
                type : Number
            },
            id : {
                required : true,
                type : String
            },
            me : {
                required : true,
                type : Boolean
            }
        },
        methods: {
            submit (e) {
                if (this.$store.getters.isLogin) {
                    if (this.me) {
                        this.$root.$refs.toast.open({
                            theme: "warning",
                            content: "不能给自己评分！"
                        });
                    } else {
                        var btn = e.currentTarget;
                        btn.setAttribute('disabled', 'disabled');
                        this.$http.post('/api/like', {
                            id : this.id,
                            type : this.type
                        }).then((res) => {
                            this.flag ? this.count-- : this.count++;
                            this.flag = !this.flag;
                            btn.removeAttribute("disabled");
                        }, () => {
                            this.$root.$refs.toast.open({
                                theme: "error",
                                content: "服务器异常，发送数据失败！"
                            });
                        });
                    }
                } else {
                    this.$root.$refs.navbar.showLogin();
                }
            }
        }
    }
</script>