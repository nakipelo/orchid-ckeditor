# CKEditor для Laravel Orchid

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nakipelo/orchid-ckeditor.svg?style=flat-square)](https://packagist.org/packages/nakipelo/orchid-ckeditor)
[![Total Downloads](https://img.shields.io/packagist/dt/nakipelo/orchid-ckeditor.svg?style=flat-square)](https://packagist.org/packages/nakipelo/orchid-ckeditor)
[![License](https://img.shields.io/packagist/l/nakipelo/orchid-ckeditor.svg?style=flat-square)](https://packagist.org/packages/nakipelo/orchid-ckeditor)

Интеграция CKEditor 4 с Laravel Orchid Platform для создания богатых текстовых редакторов в админ-панели.

## Возможности

- ✅ Полная интеграция с Laravel Orchid Platform
- ✅ CKEditor 4 с поддержкой загрузки файлов
- ✅ Интеграция с Laravel File Manager
- ✅ Stimulus контроллер для современного JavaScript
- ✅ Настраиваемые опции редактора
- ✅ Поддержка CSRF токенов
- ✅ Автоматическая публикация ресурсов

## Требования

- PHP ^8.1
- Laravel Orchid ^14.0
- Laravel File Manager (опционально)

## Установка

### 1. Установка через Composer

```bash
composer require nakipelo/orchid-ckeditor
```

### 2. Публикация ресурсов

```bash
php artisan vendor:publish --provider="Nakipelo\Orchid\CKEditor\CKEditorServiceProvider"
```

### 3. Публикация конфигурации (опционально)

```bash
php artisan vendor:publish --tag=ckeditor-config
```

## Использование

### Базовое использование

```php
use Nakipelo\Orchid\CKEditor\CKEditor;

// В вашем Screen классе
public function fields(): array
{
    return [
        CKEditor::make('content')
            ->title('Содержимое')
            ->required(),
    ];
}
```

### Расширенное использование с настройками

```php
use Nakipelo\Orchid\CKEditor\CKEditor;

public function fields(): array
{
    return [
        CKEditor::make('content')
            ->title('Содержимое')
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

## Конфигурация

После публикации конфигурации файл `config/ckeditor.php` будет содержать:

```php
return [
    /**
     * URL для загрузки CKEditor
     */
    'editorUrl' => '//cdn.ckeditor.com/4.16.2/full/ckeditor.js',

    /**
     * Настройки редактора по умолчанию
     */
    'options' => [
        'filebrowserImageBrowseUrl' => '/filemanager?type=Images',
        'filebrowserImageUploadUrl' => '/filemanager/upload?type=Images&_token=',
        'filebrowserBrowseUrl' => '/filemanager?type=Files',
        'filebrowserUploadUrl' => '/filemanager/upload?type=Files&_token=',
    ]
];
```

### Настройка File Manager

Для работы с файлами рекомендуется использовать [Laravel File Manager](https://github.com/UniSharp/laravel-filemanager):

```bash
composer require unisharp/laravel-filemanager:^2.2
```

Затем добавьте маршруты в `routes/web.php`:

```php
Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
```

## API

### CKEditor класс

#### Методы

- `make(?string $name = null): static` - Создание нового экземпляра
- `setOptions(array $options): CKEditor` - Установка опций редактора
- `mergeOptions(array $options): CKEditor` - Объединение с существующими опциями

#### Примеры опций

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
        'language' => 'ru',
        'uiColor' => '#f0f0f0',
        'removeDialogTabs' => 'image:advanced;link:advanced',
    ]);
```

## JavaScript API

Пакет использует Stimulus контроллер `ckeditor` с следующими возможностями:

### Data атрибуты

- `data-controller="ckeditor"` - Активация контроллера
- `data-ckeditor-id-value` - ID поля
- `data-ckeditor-options-value` - JSON опции редактора
- `data-ckeditor-editor-url-value` - URL для загрузки CKEditor

### События

Контроллер автоматически обрабатывает:
- Изменения содержимого редактора
- CSRF токены для загрузки файлов
- Режим source/visual
- Закрытие полноэкранного режима при навигации

## Разработка

### Установка зависимостей

```bash
npm install
```

### Сборка ресурсов

```bash
npm run dev
# или для продакшена
npm run production
```

### Структура проекта

```
src/
├── CKEditor.php              # Основной класс поля
└── CKEditorServiceProvider.php # Service Provider

resources/js/
├── ckeditor.js               # Точка входа для Stimulus
└── ckeditor_controller.js    # Stimulus контроллер

views/
└── field.blade.php           # Blade шаблон поля

config/
└── config.php                # Конфигурация по умолчанию
```

## Лицензия

MIT License. См. файл [LICENSE](LICENSE) для подробностей.

## Автор

**Egor Gruzdev**
- Email: egorgruzdev@gmail.com

## Поддержка

Если у вас есть вопросы или предложения, создайте [Issue](https://github.com/nakipelo/orchid-ckeditor/issues) в репозитории проекта.

## Changelog

См. [CHANGELOG.md](CHANGELOG.md) для списка изменений.

---

**Примечание**: Этот пакет использует CKEditor 4. Для использования CKEditor 5 рассмотрите другие решения или создайте форк с обновленной интеграцией.

## English Documentation

- [README in English](README_EN.md)
- [Changelog in English](CHANGELOG_EN.md)
