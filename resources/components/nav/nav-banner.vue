<style lang="sass" rel="scss" scoped>
    #banner {
        background: linear-gradient(4deg,#00e6ff,#00a1d6);
        height: 170px;
    }

    #padding {
        height: 45px;
    }
</style>

<template>
    <div>
        <div id="banner" v-if="open"></div>
        <div id="padding" v-else></div>
    </div>
</template>

<script>

    export default {
        data () {
            return {
                open : true
            }
        },
        methods: {
            show () {
                this.open = true
            },
            hidden () {
                this.open = false
            }
        }
    }
</script>