import Vue from 'vue';
import AnodyneLogo from '@/Shared/LogoAnodyne';

Vue.component('logo-anodyne', AnodyneLogo);

const app = document.getElementById('app');

new Vue().$mount(app);
