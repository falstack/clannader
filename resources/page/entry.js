import '../static/sass/style.scss'

import router from '../lib/router'
import store from '../lib/store'
import App from '../components/clannader.vue'

Vue.use(VueResource);

const app = new Vue({
    router,
    store,
    ...App
}).$mount('#app');