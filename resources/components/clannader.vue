<style lang="sass" rel="scss" scoped>

</style>

<template>
    <div>
        <h1>Hello App!</h1>
        <p>
            <router-link to="/foo">Go to Foo</router-link>
            <router-link to="/bar">Go to Bar</router-link>
        </p>
        <router-view></router-view>
    </div>
</template>

<script>

    Vue.http.options.root = "http://" + window.location.host;
    Vue.http.headers.common['X-CSRF-TOKEN'] = document.getElementById('_token').getAttribute('content');

    export default {
        created () {
            let bool = document.getElementById('_auth').getAttribute('content') == 1;
            this.$store.dispatch('setLogin', { bool })
        },
        mounted () {
            console.log(this.$store.getters.getLogin);
            this.$http.get('/api/user').then((res) => {
                console.log(res);
            }, (res) => {

            });
        }
    }
</script>