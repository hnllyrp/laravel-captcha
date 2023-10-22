<?php

use Hnllyrp\Captcha\Facades\Captcha;

if (!function_exists('captcha')) {
    /**
     * @param string $type
     * @param bool $api
     * @return mixed
     */
    function captcha(string $type = 'default', bool $api = false)
    {
        return Captcha::create($type, $api);
    }
}

if (!function_exists('captcha_src')) {
    /**
     * @param string $type
     * @return string
     */
    function captcha_src(string $type = 'default')
    {
        return Captcha::src($type);
    }
}

if (!function_exists('captcha_img')) {
    /**
     * @param string $type
     * @param array $attrs
     * @return string
     */
    function captcha_img(string $type = 'default', array $attrs = [])
    {
        return Captcha::img($type, $attrs);
    }
}

if (!function_exists('captcha_check')) {
    /**
     * @param string $type
     * @param string $value
     * @return bool
     */
    function captcha_check(string $type = 'default', string $value = '')
    {
        return Captcha::check($type, $value);
    }
}

if (!function_exists('captcha_api_check')) {
    /**
     * @param string $type
     * @param string $value
     * @param string $hash
     * @return bool
     */
    function captcha_api_check(string $type = 'default', string $value = '', string $hash = '')
    {
        return Captcha::check_api($type, $value, $hash);
    }
}
