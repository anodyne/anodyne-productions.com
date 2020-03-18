const mix = require('laravel-mix');
const path = require('path');
require('laravel-mix-tailwind');

mix.js('resources/js/app.js', 'public/js')
    .less('resources/less/app.less', 'public/css')
    .less('resources/less/auth.less', 'public/css')
    .less('resources/less/vendor.less', 'public/css')
    .less('resources/less/marketing.less', 'public/css')
    .tailwind()
    .options({
        processCssUrls: false
    })
    .webpackConfig({
        output: {
            chunkFilename: 'js/[name].[contenthash].js'
        },
        resolve: {
            alias: {
                '@': path.resolve(__dirname, './resources/js/'),
                '@node_modules': path.resolve(__dirname, './node_modules/'),
                vue$: 'vue/dist/vue.runtime.js'
            },
            symlinks: false
        }
    })
    .version();
