const mix = require('laravel-mix');
const path = require('path');

mix.js('resources/js/app-inertia.js', 'public/js')
    .js('resources/js/docs.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css')
    .postCss('resources/css/docs.css', 'public/css')
    .options({
        postCss: [
            /* eslint-disable */
            require('postcss-import'),
            require('tailwindcss'),
            require('postcss-nested')
            /* eslint-enable */
        ],
        processCssUrls: false
    })
    .babelConfig({
        plugins: ['@babel/plugin-syntax-dynamic-import']
    })
    .webpackConfig({
        output: {
            chunkFilename: 'js/[name].[contenthash].js'
        },
        resolve: {
            alias: {
                '@': path.resolve(__dirname, './resources/js/'),
                '@node_modules': path.resolve(__dirname, './node_modules/'),
                ziggy: path.resolve(__dirname, './vendor/tightenco/ziggy/dist/js/route.js')
            },
            symlinks: false
        },
        node: {
            fs: 'empty'
        }
    });
