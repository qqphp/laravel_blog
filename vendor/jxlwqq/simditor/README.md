# Simditor extension for laravel-admin


This is a `laravel-admin` extension that integrates [Simditor](https://github.com/mycolorway/simditor) into the `laravel-admin` form.
## Screenshot

<img alt="simditor" src="https://user-images.githubusercontent.com/2421068/45915071-0e9c8f00-be81-11e8-94b5-8094113b71f1.png">

## Installation

```bash
composer require jxlwqq/simditor

php artisan vendor:publish --tag=laravel-admin-simditor
```

## Configuration

In the `extensions` section of the `config/admin.php` file, add some configuration that belongs to this extension.
```php

'extensions' => [
    'simditor' => [
        // Set to false if you want to disable this extension
        'enable' => true,
        // Editor configuration
        'config' => [
            'upload' => [
                'url' => '/admin/api/upload', # example api route: admin/api/upload
                'fileKey' => 'upload_file',
                'connectionCount' => 3,
                'leaveConfirm' => 'Uploading is in progress, are you sure to leave this page?'
            ],
            'tabIndent' => true,
            'toolbar' => ['title', 'bold', 'italic', 'underline', 'strikethrough', 'fontScale', 'color', '|', 'ol', 'ul', 'blockquote', 'code', 'table', '|', 'link', 'image', 'hr', '|', 'indent', 'outdent', 'alignment'],
            'toolbarFloat' => true,
            'toolbarFloatOffset' => 0,
            'toolbarHidden' => false,
            'pasteImage' => true,
            'cleanPaste' => false,
        ]
    ]
]
```

The configuration of the editor can be found in [Simditor Documentation](https://simditor.tower.im/docs/doc-usage.html).

## Usage

Use it in the form form:
```php
$form->simditor('content');
```

## More resources

[Awesome Laravel-admin](https://github.com/jxlwqq/awesome-laravel-admin)

License
------------
Licensed under [The MIT License (MIT)](LICENSE).
