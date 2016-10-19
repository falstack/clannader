<style lang="sass" rel="scss" scoped>
    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 86px;
    }
</style>

<template>
    <div class="container">
        404 Not Found
    </div>
</template>

<script>

    export default {
        beforeCreate () {
            this.$root.$data.load = true;
        },
        created () {
            document.title = '该页面不存在 - CLANNADer'
        }
    }
</script>