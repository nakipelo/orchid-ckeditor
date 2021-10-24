let mix = require('laravel-mix');

mix
	.options({
		processCssUrls: false
	})
	.js('resources/js/ckeditor.js', 'orchid_ckeditor.js')
	.setPublicPath('public')
	.version();