<style lang="sass" rel="scss" scoped>
    @import "../../static/sass/variables";

    $creator-width : 58px;
    $creator-height : 48px;
    $create-radius: 8px;


    #warp {
        position: relative;
        width: $creator-width;
        height: $creator-height;
    }

    #creator {
        display: block;
        width: $creator-width;
        height: $creator-height;
        line-height: $creator-height;
        background: linear-gradient($color-blue,$color-blue-hover);
        border-radius: 0 0 $create-radius $create-radius;
        text-align: center;
        color: #fff;
        z-index: 20;
        font-size: 14px;
        position: absolute;
        left: 0;
        top: 0;

        &:hover {
            background: linear-gradient(#3cd8ff,$color-blue);

            & + #menu {
                height: $nav-height * 3;
                visibility: visible;
                opacity: 1;
            }
        }
    }

    #menu {
        position: absolute;
        left: 0;
        height: 0;
        width: $creator-width;
        top: $creator-height - $create-radius;
        padding-top: $create-radius;
        z-index: 15;
        background-color: #fff;
        border-radius: 0 0 4px 4px;
        box-shadow: 0 2px 4px rgba(0,0,0,.16);
        overflow: hidden;
        transition: .4s;
        visibility: hidden;
        opacity: 0;

        &:hover {
            height: $nav-height * 3;
            visibility: visible;
            opacity: 1;
        }

        a {
            display: block;
            width: $creator-width;
            height: $nav-height;
            line-height: $nav-height;
            text-align: center;
            font-size: 13px;

            &:hover {
                background-color: $color-gray-hover;
            }
        }
    }
</style>

<template>
    <div v-if="$store.getters.isLogin">
        <div v-if="$store.getters.isMobile">

        </div>
        <div v-else id="warp">
            <a id="creator">创作</a>
            <div id="menu">
                <a>发帖</a>
                <a>提问</a>
                <a>写作</a>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        components: {

        },
        props: {

        },
        computed: {

        },
        data () {
            return {

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