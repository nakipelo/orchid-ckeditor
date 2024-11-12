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
		'options' => [],
	];

	public static function make(?string $name = null): static
	{
		return (new static())
			->name($name)
			->setOptions(config('ckeditor.options', []));
	}

	public function setOptions(array $options): CKEditor
	{
		$this->attributes['options'] = $options;

		return $this;
	}

	public function mergeOptions(array $options): CKEditor
	{
		$this->attributes['options'] = array_merge($this->attributes['options'], $options);

		return $this;
	}
}
