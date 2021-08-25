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
    }

    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/../views', 'ckeditor');
        $this->mergeConfigFrom(__DIR__ . '/../config/ckeditor.php', 'ckeditor');
    }
}