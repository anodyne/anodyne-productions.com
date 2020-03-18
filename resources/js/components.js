import Vue from 'vue';

Vue.component('base-layout', require('./components/layouts/BaseLayout').default);
Vue.component('account-layout', require('./components/layouts/AccountLayout').default);
Vue.component('marketing-layout', require('./components/layouts/MarketingLayout').default);

require.context('./', true, /\.vue$/i, 'lazy')
    .keys()
    .forEach((file) => {
        Vue.component(file.split('/').pop().split('.')[0], (resolve) => {
            import(`${file}`  /* webpackChunkName: "[request]" */)
                .then((component) => {
                    resolve(component.default);
                });
        });
    });

// const files = require.context('./', true, /\.vue$/i);
// files.keys()
//     .map((key) => {
//         const componentName = key.split('/')
//             .splice(2)
//             .map((s) => {
//                 return s.charAt(0).toUpperCase() + s.substring(1);
//             })
//             .join('')
//             .replace('.vue', '');

//         return Vue.component(componentName, files(key).default);
//     });