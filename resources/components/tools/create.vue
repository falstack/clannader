<style lang="sass" rel="scss" scoped>
    @import "../../static/sass/variables";

    .mask {
        width: 100%;
        height: 100%;
        position: fixed;
        left: 0;
        top: 0;
        background-color: rgba(0, 0, 0, .3);
        z-index: 10000;
    }

    .m-create {
        position: fixed;
        right: 15px;
        bottom: 30px;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: $color-blue;
        border: 3px solid #fff;
        color: #fff;
        text-align: center;
        line-height: 34px;
        font-size: 18px;
        font-weight: 700;
        cursor: pointer;
        box-shadow: 0 1px 5px rgba(0, 0, 0, .3);
        transition: .2s;
        z-index: 10000;
    }

    .create-show {
        transform:rotate(45deg);
    }

    .menu {
        width: 70px;
        position: fixed;
        right: 15px;
        bottom: 100px;

        div {
            color: #fff;
            margin-top: 20px;
            background-color: red;
            text-align: center;
            padding: 5px 10px;
            font-size: 13px;
            border-radius: 4px;
            cursor: pointer;
        }

        .post {
            background-color: $color-yellow-light;

            &:hover {
                background-color: $color-yellow;
            }
        }
    }
</style>

<template>
    <div>
        <div class="mask" v-show="show">
            <div class="menu">
                <div class="post" @click="post">发帖</div>
                <!--<div>写作</div>-->
                <!--<div>提问</div>-->
            </div>
        </div>
        <div :class="[ 'm-create', show ? 'create-show' : '' ]" @click="show = !show">+</div>
    </div>
</template>

<script lang="babel">

    export default {
        data () {
            return {
                show : false
            }
        },
        methods: {
            post () {
                this.show = false;
                this.$root.$refs.post.open()
            }
        }
    }
</script>