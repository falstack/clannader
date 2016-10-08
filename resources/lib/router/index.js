Vue.use(VueRouter);

const routes = [
    { path: '/', component: require('../../components/index/index.vue') },
    { path: '/posts', component: require('../../components/post/list.vue') },
    { path: '/post/:id(\\d+)', component: require('../../components/post/show.vue') },
    { path: '/bangumi/:id(\\d+)', component: require('../../components/bangumi/index.vue') },
];

export default new VueRouter({
    mode: 'history',
    routes
});