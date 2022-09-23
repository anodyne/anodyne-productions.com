const mix = require('laravel-mix');

mix.postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('postcss-nested'),
    require('tailwindcss'),
]);

mix.postCss('resources/css/filament.css', 'public/css', [
    require('tailwindcss'),
]);

mix.options({
    processCssUrls: false
});

mix.js('resources/js/app.js', 'public/js');

if (mix.inProduction()) {
    mix.version();
}
