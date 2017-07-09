# OneSignalServiceProvider

OneSignal Service Provider for Silex 


## Requirements
silex 1.x

## Installation
The best way to install OneSignalServiceProvider is to use a [Composer](https://getcomposer.org/download):

    php composer.phar require junker/onesignal-service-provider

## Examples

```php
use HSAL\HSAL;
use Junker\Silex\Provider\OneSignalServiceProvider;

$app->register(new OneSignalServiceProvider(), [
    'onesignal.options' => [
        'app_id' => 'my App id',
        'api_key' => 'my REST API key',
        'user_auth_key' => 'my User Auth key'
    ]
]);

$notifications = $app['onesignal']->notifications->getAll();

```

## Documentation

[OneSignal PHP Documentation](https://github.com/norkunas/onesignal-php-api/blob/1.0/README.md)
[OneSignal API Documentation](https://documentation.onesignal.com/reference)

