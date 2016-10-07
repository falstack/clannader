Vue.use(VueRouter);

const routes = [
    { path: '/', component: require('../../components/index.vue') },
    { path: '/post/:id(\\d+)', component: require('../../components/post/show.vue') },
];

export default new VueRouter({
    mode: 'history',
    routes
});