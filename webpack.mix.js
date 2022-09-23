const mix = require('laravel-mix');

mix.postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('postcss-nested'),
    ]);

mix.js('resources/js/app.js', 'public/js');

if (mix.inProduction()) {
    mix.version();
}
