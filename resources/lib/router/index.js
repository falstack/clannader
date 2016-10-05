Vue.use(VueRouter);

const Bar = { template: '<div>bar</div>' };

const routes = [
    { path: '/foo', component: require('../../components/test.vue') },
    { path: '/bar', component: Bar }
];

export default new VueRouter({
    mode: 'history',
    routes
});