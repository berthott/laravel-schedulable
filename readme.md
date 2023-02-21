# Laravel-Schedulable

Laravel Helper for scheduling model related tasks.

## Installation

```
$ composer require berthott/laravel-schedulable
```

## Usage

* Use the `Schedulable` trait in your model
* Add any number of `schedulabe*` methods in your model (eg. `schedulableTest`)
* Run the laravel scheduler according to the [documentation](https://laravel.com/docs/10.x/scheduling#running-the-scheduler)

## Options

To change the default options use
```
$ php artisan vendor:publish --provider="berthott\Schedulable\SchedulableServiceProvider" --tag="config"
```
* `namespace`: string or array with one ore multiple namespaces that should be monitored for the Schedulable-Trait. Defaults to `App\Models`.
* `cron`: cron frequency for the scheduler to be called. Defaults to every minute: `* * * * *`

## Compatibility

Tested with Laravel 10.x.

## License

See [License File](license.md). Copyright © 2023 Jan Bladt.