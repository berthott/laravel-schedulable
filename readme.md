# Laravel-Schedulable

Laravel Helper for scheduling model related tasks.

## Installation

```sh
$ composer require berthott/laravel-schedulable
```

## Usage

* Use the `Schedulable` trait in your model
* Add any number of `schedulabe*` methods in your model (eg. `schedulableTest`)
* Run the laravel scheduler according to the [documentation](https://laravel.com/docs/10.x/scheduling#running-the-scheduler)
* Your `schedulabe*` methods will be called every time the laravel scheduler runs.
  * Inside of your method you can do your own checks whether to run the logic or not.

## Options

To change the default options use
```php
$ php artisan vendor:publish --provider="berthott\Schedulable\SchedulableServiceProvider" --tag="config"
```
* `namespace`: String or array with one ore multiple namespaces that should be monitored for the configured trait. Defaults to `App\Models`.
* `cron`: Cron frequency for the scheduler to be called. Defaults to every minute: `* * * * *`

## Compatibility

Tested with Laravel 10.x.

## License

See [License File](license.md). Copyright © 2023 Jan Bladt.