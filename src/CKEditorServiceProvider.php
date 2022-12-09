<?php

declare(strict_types=1);

namespace Nakipelo\Orchid\CKEditor;

use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Support\ServiceProvider;
use Orchid\Support\Facades\Dashboard;

class CKEditorServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->callAfterResolving('view', static function (ViewFactory $factory) {
            $factory->composer('platform::app', static function () {
                Dashboard::registerResource('scripts', asset('/vendor/ckeditor/orchid_ckeditor.js'));
            });
        });

        $this->offerPublishing();
    }

    protected function offerPublishing(): void
    {
        if (!$this->app->runningInConsole()) {
            return;
        }
        $this->publishes([
            dirname(__DIR__) . '/public' => public_path('vendor/ckeditor')
        ], 'assets');

        $this->publishes([
            dirname(__DIR__) . '/config/config.php' => config_path('ckeditor.php')
        ], 'config');
    }

    public function register(): void
    {
        $this->loadViewsFrom(dirname(__DIR__) . '/views', 'ckeditor');

        $this->mergeConfigFrom(dirname(__DIR__) . '/config/config.php', 'ckeditor');
    }
}
