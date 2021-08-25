let mix = require('laravel-mix');

mix
	.options({
		processCssUrls: false
	})
	.js('resources/js/ckeditor_controller.js', 'ckeditor.js')
	.setPublicPath('public')
	.version();