Vue.use(VueRouter);

const routes = [
    { path: '/', component: require('../../components/index/index.vue') },
    { path: '/dollars', component: require('../../components/dollars.vue') },
    { path: '/posts', component: require('../../components/post/list.vue') },
    { path: '/post/:id(\\d+)', component: require('../../components/post/show.vue') },
    { path: '/bangumi/:id(\\d+)', component: require('../../components/bangumi/index.vue') },
    { path: '/people/:id', component: require('../../components/people/index.vue'),
        children: [
            {
                path: 'bangumi',
                component: require('../../components/people/bangumi.vue')
            },
            {
                path: 'edit',
                component: require('../../components/people/edit.vue')
            },
            {
                path: 'post',
                component: require('../../components/people/post.vue')
            },
            {
                path: 'net',
                component: require('../../components/people/net.vue')
            },
            {
                path: 'inbox',
                component: require('../../components/people/inbox.vue')
            }
        ]
    },
    { path: '/door/404', component: require('../../components/door/404.vue') },
    { path: '/door/star', component: require('../../components/door/star.vue') },
];

export default new VueRouter({
    mode: 'history',
    routes
});