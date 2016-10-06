Vue.use(VueRouter);

const routes = [
    { path: '/', component: require('../../components/index.vue') },
];

export default new VueRouter({
    mode: 'history',
    routes
});