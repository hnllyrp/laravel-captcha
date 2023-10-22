<?php

return [
    'disable' => env('CAPTCHA_DISABLE', false),

    // 验证码位数
    'length' => 5,
    // 验证码字符集合
    'codeSet' => '23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXY',
    // 验证码过期时间 单位：s
    'expire' => 1800,
    // 是否使用中文验证码
    'useZh' => false,
    // 是否使用算术验证码
    'math' => false,
    // 是否使用背景图
    'useImgBg' => false,
    //验证码字符大小
    'fontSize' => 25,
    // 是否使用混淆曲线
    'useCurve' => true,
    //是否添加杂点
    'useNoise' => true,
    // 验证码字体 不设置则随机
    'fontttf' => '',
    //背景颜色
    'bg' => [243, 251, 254],
    // 验证码图片高度
    'imageH' => 0,
    // 验证码图片宽度
    'imageW' => 0,

    // 添加额外的验证码设置
    'default' => [
        'length' => 5,
        'imageW' => 130,
        'imageH' => 36,
        'expire' => 60,
        'fontSize' => 14
    ],
    // 算术
    'mathe' => [
        'length' => 5,
        'imageW' => 130,
        'imageH' => 36,
        'expire' => 60,
        'fontSize' => 15,
        'math' => true,
        'useNoise' => false,
    ],
    // 背景图
    'image' => [
        'length' => 5,
        'imageW' => 130,
        'imageH' => 36,
        'expire' => 60,
        'fontSize' => 13,
        'useImgBg' => true,
        'useNoise' => false,
    ],
    // 中文
    'chinese' => [
        'length' => 4,
        'imageW' => 130,
        'imageH' => 36,
        'expire' => 60,
        'fontSize' => 13,
        'useZh' => true,
        'useNoise' => false,
    ],

];
