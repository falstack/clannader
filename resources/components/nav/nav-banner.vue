<style lang="sass" rel="scss" scoped>
    @import "../../static/sass/variables";

    #banner {
        background: linear-gradient(4deg,#00e6ff,#00a1d6);
        height: 170px;
    }

    #padding {
        height: $nav-height;
    }
</style>

<template>
    <div>
        <div id="banner" v-show="open"></div>
        <div id="padding" v-show="padding"></div>
    </div>
</template>

<script>

    export default {
        data () {
            return {
                open : true,
                padding : false
            }
        },
        methods: {
            show () {
                this.open = true;
                this.padding = false;
            },
            block () {
                this.open = false;
                this.padding = true;
            },
            hidden () {
                this.open = false;
                this.padding = false;
            }
        }
    }
</script>