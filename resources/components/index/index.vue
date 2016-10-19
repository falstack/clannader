<style lang="sass" rel="scss" scoped>

</style>

<template>
    <background></background>
</template>

<script>

    import background from './background.vue'

    export default {
        components: {
            background
        },
        created () {
            document.title = '首页 - CLANNADer'
        }
    }
</script>