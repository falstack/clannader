<template>
    <div>
        <router-link to="/foo">go to foo</router-link>
        <router-link to="/bar">go to bar</router-link>
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
                console.log(res.body);
            }, (res) => {

            });
        }
    }
</script>