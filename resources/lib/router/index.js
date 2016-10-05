Vue.use(VueRouter);

const Foo = { template: '<div>foo</div>' };
const Bar = { template: '<div>bar</div>' };

export default new VueRouter({
    mode: 'history',
    routes: [
        { path: '/foo', components: Foo },
        { path: '/bar', components: Bar }
    ]
});