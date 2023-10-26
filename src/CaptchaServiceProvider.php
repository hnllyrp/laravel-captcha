<?php

namespace Hnllyrp\Captcha;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Factory;

class CaptchaServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Merge configs
        $this->mergeConfigFrom(__DIR__ . '/../config/captcha.php', 'captcha');

        $this->app->bind('captcha', function ($app) {
            return new Captcha(
                $app['Illuminate\Contracts\Config\Repository'],
                $app['Illuminate\Session\Store']
            );
        });

    }

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        // Publish configuration files
        $this->publishes([
            __DIR__ . '/../config/captcha.php' => config_path('captcha.php')
        ], 'config');

        if (!config('captcha.disable')) {
            if (!$this->app->routesAreCached()) {
                Route::group(['namespace' => __NAMESPACE__ . '\Controllers'], function (Router $router) {
                    $router->get('api/captcha/{type?}', 'CaptchaController@getCaptchaApi')->middleware('api');
                    $router->get('captcha/{type?}', 'CaptchaController@getCaptcha')->middleware('web');
                    // $router->post('api/verify_captcha', 'CaptchaController@verifyCaptchaApi')->middleware('api');
                    // $router->post('verify_captcha', 'CaptchaController@verifyCaptcha')->middleware('web');
                });
            }

            /* @var Factory $validator */
            $validator = $this->app['validator'];
            $message = ':attribute 不正确或已过期。';
            // Validator extensions
            $validator->extend('captcha', function ($attribute, $value, $parameters) {
                $captcha_type = $parameters[0] ?? 'default';
                return config('captcha.disable') || ($value && captcha_check($captcha_type, $value));
            }, $message);
            // $parameters exp: 'required|captcha_api:default,hash';
            $validator->extend('captcha_api', function ($attribute, $value, $parameters) {
                $captcha_type = $parameters[0] ?? 'default';
                $captcha_hash = $parameters[1] ?? '';
                return config('captcha.disable') || ($value && captcha_api_check($captcha_type, $value, $captcha_hash));
            }, $message);
        }

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['captcha'];
    }
}
