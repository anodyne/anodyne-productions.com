const mix = require('laravel-mix');

mix
    .postCss('resources/css/app.css', 'public/css')
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
    .webpackConfig({
        node: {
            fs: 'empty'
        }
    });
