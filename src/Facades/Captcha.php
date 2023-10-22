<?php

namespace Hnllyrp\Captcha\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Captcha
 * @method static create($type, $api)
 * @method static src($type)
 * @method static img($type, $attrs)
 * @method static check($type, $value)
 * @method static check_api($type, $value, $key)
 */
class Captcha extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \Hnllyrp\Captcha\Captcha::class;
    }
}
