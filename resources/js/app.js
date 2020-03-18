import Vue from 'vue';
import FormErrors from './form-errors';

import './plugins';
import './components';

window.FormErrors = new FormErrors();

require('turbolinks').start();

document.addEventListener('turbolinks:load', () => {
    const root = document.getElementById('app');

    if (window.vue) {
        window.vue.$destroy(true);
    }

    window.vue = new Vue({
        render (h) {
            return h(
                Vue.component(root.dataset.component), {
                    props: JSON.parse(root.dataset.props)
                }
            );
        }
    }).$mount(root);
});
