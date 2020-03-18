import Vue from 'vue';
import { InertiaApp } from '@inertiajs/inertia-vue';
import VuePortal from '@linusborg/vue-simple-portal';
import route from 'ziggy';

Vue.prototype.$route = route;

Vue.use(InertiaApp);
Vue.use(VuePortal, {
    selector: '#portal'
});
