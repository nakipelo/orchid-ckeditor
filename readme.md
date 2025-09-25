# CKEditor for Laravel Orchid

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nakipelo/orchid-ckeditor.svg?style=flat-square)](https://packagist.org/packages/nakipelo/orchid-ckeditor)
[![Total Downloads](https://img.shields.io/packagist/dt/nakipelo/orchid-ckeditor.svg?style=flat-square)](https://packagist.org/packages/nakipelo/orchid-ckeditor)
[![License](https://img.shields.io/packagist/l/nakipelo/orchid-ckeditor.svg?style=flat-square)](https://packagist.org/packages/nakipelo/orchid-ckeditor)

CKEditor 4 integration with Laravel Orchid Platform for creating rich text editors in the admin panel.

## Features

- ✅ Full integration with Laravel Orchid Platform
- ✅ CKEditor 4 with file upload support
- ✅ Laravel File Manager integration
- ✅ Stimulus controller for modern JavaScript
- ✅ Customizable editor options
- ✅ CSRF token support
- ✅ Automatic asset publishing

## Requirements

- PHP ^8.1
- Laravel Orchid ^14.0
- Laravel File Manager (optional)

## Installation

### 1. Install via Composer

```bash
composer require nakipelo/orchid-ckeditor
```

### 2. Publish Assets

```bash
php artisan vendor:publish --provider="Nakipelo\Orchid\CKEditor\CKEditorServiceProvider"
```

### 3. Publish Configuration (optional)

```bash
php artisan vendor:publish --tag=ckeditor-config
```

## Usage

### Basic Usage

```php
use Nakipelo\Orchid\CKEditor\CKEditor;

// In your Screen class
public function fields(): array
{
    return [
        CKEditor::make('content')
            ->title('Content')
            ->required(),
    ];
}
```

### Advanced Usage with Custom Options

```php
use Nakipelo\Orchid\CKEditor\CKEditor;

public function fields(): array
{
    return [
        CKEditor::make('content')
            ->title('Content')
            ->setOptions([
                'toolbar' => [
                    ['Bold', 'Italic', 'Underline'],
                    ['NumberedList', 'BulletedList'],
                    ['Link', 'Unlink'],
                    ['Image', 'Table'],
                ],
                'height' => 300,
            ])
            ->mergeOptions([
                'filebrowserImageBrowseUrl' => '/filemanager?type=Images',
                'filebrowserImageUploadUrl' => '/filemanager/upload?type=Images&_token=' . csrf_token(),
            ]),
    ];
}
```

## Configuration

After publishing the configuration, the `config/ckeditor.php` file will contain:

```php
return [
    /**
     * URL for loading CKEditor
     */
    'editorUrl' => '//cdn.ckeditor.com/4.16.2/full/ckeditor.js',

    /**
     * Default editor options
     */
    'options' => [
        'filebrowserImageBrowseUrl' => '/filemanager?type=Images',
        'filebrowserImageUploadUrl' => '/filemanager/upload?type=Images&_token=',
        'filebrowserBrowseUrl' => '/filemanager?type=Files',
        'filebrowserUploadUrl' => '/filemanager/upload?type=Files&_token=',
    ]
];
```

### File Manager Setup

For file management, it's recommended to use [Laravel File Manager](https://github.com/UniSharp/laravel-filemanager):

```bash
composer require unisharp/laravel-filemanager:^2.2
```

Then add routes to `routes/web.php`:

```php
Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
```

## API

### CKEditor Class

#### Methods

- `make(?string $name = null): static` - Create a new instance
- `setOptions(array $options): CKEditor` - Set editor options
- `mergeOptions(array $options): CKEditor` - Merge with existing options

#### Options Examples

```php
$editor = CKEditor::make('content')
    ->setOptions([
        'toolbar' => [
            ['Bold', 'Italic', 'Underline'],
            ['NumberedList', 'BulletedList'],
            ['Link', 'Unlink'],
            ['Image', 'Table'],
            ['Source'],
        ],
        'height' => 400,
        'width' => '100%',
        'language' => 'en',
        'uiColor' => '#f0f0f0',
        'removeDialogTabs' => 'image:advanced;link:advanced',
    ]);
```

## JavaScript API

The package uses a Stimulus controller `ckeditor` with the following capabilities:

### Data Attributes

- `data-controller="ckeditor"` - Activate controller
- `data-ckeditor-id-value` - Field ID
- `data-ckeditor-options-value` - JSON editor options
- `data-ckeditor-editor-url-value` - URL for loading CKEditor

### Events

The controller automatically handles:
- Editor content changes
- CSRF tokens for file uploads
- Source/visual mode switching
- Fullscreen mode closing on navigation

## Development

### Install Dependencies

```bash
npm install
```

### Build Assets

```bash
npm run dev
# or for production
npm run production
```

### Project Structure

```
src/
├── CKEditor.php              # Main field class
└── CKEditorServiceProvider.php # Service Provider

resources/js/
├── ckeditor.js               # Stimulus entry point
└── ckeditor_controller.js    # Stimulus controller

views/
└── field.blade.php           # Blade field template

config/
└── config.php                # Default configuration
```

## License

MIT License. See the [LICENSE](LICENSE) file for details.

## Author

**Egor Gruzdev**
- Email: egorgruzdev@gmail.com

## Support

If you have questions or suggestions, please create an [Issue](https://github.com/nakipelo/orchid-ckeditor/issues) in the project repository.

## Changelog

See [CHANGELOG_EN.md](CHANGELOG_EN.md) for a list of changes.

---

**Note**: This package uses CKEditor 4. For CKEditor 5 usage, consider other solutions or create a fork with updated integration.

## Русская Документация

- [README на русском](README.md)
- [Changelog на русском](CHANGELOG.md)
