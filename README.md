# laravel-tinyid
A TinyID bridge for Laravel


## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

```bash
$ composer require krowinski/laravel-tinyid
```

If you want you can use the [facade](http://laravel.com/docs/facades). Add the reference in `config/app.php` to your aliases array.

```php
  'TinyID' => LaravelTinyID\Facades\TinyID::class
```


## Configuration

Laravel TinyID requires connection configuration. To get started, you'll need to publish all vendor assets:

```bash
$ php artisan vendor:publish
```

This will create a `config/tinyID.php`


### Examples

```php
var_dump(TinyId::encode('48888851145')); // will print 1FN7Ab
var_dump(TinyId::decode('1FN7Ab')); // will print 48888851145
```