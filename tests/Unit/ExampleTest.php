<?php

namespace Hnllyrp\Captcha\Tests\Unit;


use Hnllyrp\Captcha\Facades\Captcha;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testBase()
    {
        // create api captcha
        $type = 'default';
        $data = Captcha::create($type, true);

        // verify api captcha
        $value = $data['phrase'] ?? '';
        $hash = $data['hash'] ?? '';
        $result = Captcha::check_api($type, $value, $hash);

        $this->assertTrue(true, $result);
    }

}
