let mix = require('laravel-mix');

mix
	.options({
		processCssUrls: false
	})
	.js('resources/js/ckeditor.js', 'orchid_ckeditor.js')
	.css('resources/css/ckeditor.css', 'orchid_ckeditor.css')
	.setPublicPath('public')
	.version();