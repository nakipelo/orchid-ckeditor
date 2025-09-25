<?php
declare(strict_types=1);

return [
    /**
     * Скрипты загрузки редактора
     * @link https://ckeditor.com/ckeditor-4/download/
     */
    'editorUrl' => '//cdn.ckeditor.com/4.22.1/full/ckeditor.js',

    /**
     * Настройки редактора по-умолчанию
     * Ниже приведены настройки для подключения файлового
     * менеджера на основе "unisharp/laravel-filemanager:^2.2"
     * 
     * @link https://ckeditor.com/docs/ckeditor4/latest/
     */
    'options' => [
        'filebrowserImageBrowseUrl' => '/filemanager?type=Images',
        'filebrowserImageUploadUrl' => '/filemanager/upload?type=Images&_token=',
        'filebrowserBrowseUrl' => '/filemanager?type=Files',
        'filebrowserUploadUrl' => '/filemanager/upload?type=Files&_token=',
    ]
];