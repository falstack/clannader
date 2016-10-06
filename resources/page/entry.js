import '../static/sass/style.scss'
import '../static/js/geetest'
import '../static/js/jquery'

import router from '../lib/router'
import store from '../lib/store'
import App from '../components/clannader.vue'

Vue.use(VueResource);

const app = new Vue({
    router,
    store,
    ...App
}).$mount('#app');