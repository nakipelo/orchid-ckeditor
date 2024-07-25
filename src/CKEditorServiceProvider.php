<?php

declare(strict_types=1);

namespace Nakipelo\Orchid\CKEditor;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Orchid\Support\Facades\Dashboard;

class CKEditorServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->callAfterResolving('view', static function (ViewFactory  $factory) {
            $factory->composer('platform::app', static function () {
                Dashboard::registerResource('scripts', asset('vendor/nakipelo/orchid-ckeditor/orchid_ckeditor.js'));
            });
        });

        $this->offerPublishing();
    }

    public function register()
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'ckeditor');

        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'ckeditor');
    }

    protected function offerPublishing()
    {
        if(! $this->app->runningInConsole()) {
            return;
        }

		$this->publishes([
			__DIR__.'/../public' => public_path('vendor/nakipelo/orchid-ckeditor'),
		], ['ckeditor-assets', 'laravel-assets', 'orchid-assets']);

        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('ckeditor.php'),
        ], 'ckeditor-config');
    }
}
