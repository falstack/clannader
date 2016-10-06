<style lang="sass" rel="scss">
    #bottom {
        height: 48px;
        line-height: 48px;
        border-top: 1px solid #ccc;
        text-align: center;
        flex: 0;
        box-sizing: content-box;
        margin-top: 20px;

        a {
            color : #aaa;
            transition: .3s ease-in-out;
            font-size: 14px;

            &:hover {
                color: #00bfef;
            }
        }
    }
</style>

<template>
    <div id="bottom" class="container" v-show="open">
        <a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=4e66b86ac0fc8d882652b8c8ed1383e4725422dd7c1b96dfd6e1a6aef5d36065">加入QQ群</a>
    </div>
</template>

<script>

    export default {
        data () {
            return {
                open : true
            }
        },
        methods : {
            show () {
                this.open = true
            },
            hidden () {
                this.open = false
            }
        }
    }
</script>