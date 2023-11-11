<?php

namespace Hnllyrp\Captcha\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Captcha
 * @method static create($type = 'default', $api = false)
 * @method static src($type = 'default')
 * @method static img($type = 'default', array $attrs = [])
 * @method static check($type = 'default', $code = '')
 * @method static check_api($type = 'default', $code = '', $hash = '')
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
