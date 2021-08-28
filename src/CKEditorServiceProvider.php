<?php

declare(strict_types=1);

namespace Nakipelo\Orchid\CKEditor;

use Illuminate\Support\ServiceProvider;
use Orchid\Support\Facades\Dashboard;

class CKEditorServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Dashboard::addPublicDirectory('ckeditor', __DIR__ . '/../public');
        
        $this->offerPublishing();
    }

    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/../views', 'ckeditor');

        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'ckeditor');
    }

    protected function offerPublishing()
    {
        if(! $this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('ckeditor.php'),
        ], 'ckeditor-config');
    }
}