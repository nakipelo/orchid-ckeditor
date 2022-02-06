<?php
declare(strict_types=1);

namespace Nakipelo\Orchid\CKEditor;

use Orchid\Screen\Field;

class CKEditor extends Field
{
    /** @var string */
    protected $view = 'ckeditor::field';

    /** @var array  */
    protected $attributes = [
    ];

    public static function make(?string $name = null): Field
    {
        return (new static())->name($name);
    }
}
