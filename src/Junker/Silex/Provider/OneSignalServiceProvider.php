<?php
namespace Junker\Silex\Provider;
use Silex\Application;
use Silex\ServiceProviderInterface;
use GuzzleHttp\Client as GuzzleClient;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use Http\Client\Common\HttpMethodsClient as HttpClient;
use Http\Message\MessageFactory\GuzzleMessageFactory;
use OneSignal\Config;
use OneSignal\Devices;
use OneSignal\OneSignal;


class OneSignalServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['onesignal'] = $app->share(function(Application $app) {
            $options = $app['onesignal.options'];
            
            $guzzle = new GuzzleClient(isset($options['guzzle']) ? $options['guzzle'] : []);

            $client = new HttpClient(new GuzzleAdapter($guzzle), new GuzzleMessageFactory());
                
            $config = new Config();
            $config->setApplicationId($options['app_id']);
            $config->setApplicationAuthKey($options['api_key']);

            $onesignal = new OneSignal($config, $client);

            return $onesignal;
        });
    }
    public function boot(Application $app)
    {
    }
}
