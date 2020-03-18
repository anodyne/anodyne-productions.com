import { InertiaApp } from '@inertiajs/inertia-vue';
import Vue from 'vue';

import './Utils/plugins';
import './Utils/components';

const app = document.getElementById('app');

new Vue({
    render(h) {
        return h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: name => import(`@/Pages/${name}`).then(module => module.default)
            }
        });
    }
}).$mount(app);
