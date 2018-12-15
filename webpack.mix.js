const mix = require('laravel-mix');
require('laravel-mix-tailwind');

mix
    // .extract(['axios', 'lodash', 'vue'])
	.js('resources/js/app.js', 'public/js')
	.less('resources/less/app.less', 'public/css')
	.less('resources/less/auth.less', 'public/css')
	.less('resources/less/vendor.less', 'public/css')
	.less('resources/less/marketing.less', 'public/css')
	.tailwind()
	.options({
		processCssUrls: false
	});
