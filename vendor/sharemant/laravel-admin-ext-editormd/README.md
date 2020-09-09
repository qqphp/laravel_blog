# EditorMD extension for laravel-admin

This is a `laravel-admin` extension that integrates [EditorMD](http://pandao.github.io/editor.md/) into the `laravel-admin` form.
To adopt to laravel-admin, I made some tiny changes in editormd aseets.
Please feel free to contact me if you encounter any difficulties when you use this extension.

## Screenshot

![screenshot](https://user-images.githubusercontent.com/4065724/52049451-d02e8380-2588-11e9-96b8-1cf66b18f934.jpg)

## Installation

```bash
composer require sharemant/laravel-admin-ext-editormd
php artisan vendor:publish --tag=laravel-admin-ext-editormd
```

## Configuration

In the `extensions` section of the `config/admin.php` file, add some configuration that belongs to this extension.

### Required configuration example

```php
'extensions' => [
    'editormd' => [
        // Set to false if you want to disable this extension
        'enable' => true,
		// Set to true if you want to take advantage the screen length for your editormd instance.
		'wideMode' => false,
		// Set to true when the instance included in larave-admin tab component.
		'dynamicMode' => false,
        // Editor configuration
        'config' => [
		'path' => '/vendor/laravel-admin-ext/editormd/editormd-1.5.0/lib/',
		'width' => '100%',
        'height' => 600,
        ]
    ]
]
```

### Default configuration list

If you want to enable more functions of EditorMd , you could add the following configurations to your config.
The configuration of the editor can be found in [EditorMD Documentation](http://pandao.github.io/editor.md/).

## Usage

Use it in the form form:
```php
$form->editormd('content');
```


License
------------
Licensed under [The MIT License (MIT)](LICENSE).