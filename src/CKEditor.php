<?php
declare(strict_types=1);

namespace Nakipelo\Orchid\CKEditor;

use Orchid\Screen\Field;

/**
 * @method CKEditor required(bool $value = true)
 * @method CKEditor name(?string $value)
 */
class CKEditor extends Field
{
    /** @var string */
    protected $view = 'ckeditor::field';

    /** @var array */
    protected $attributes = [
        'title' => 'Content'
    ];

    /**
     * @param string|null $name
     * @return CKEditor
     */
    public static function make(?string $name = null): Field
    {
        return (new static())->name($name);
    }
}
