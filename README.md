# laravel-captcha

The captcha package for laravel 图形验证码

- 支持多种类型 数字字母验证码，算术验证码，中文验证码
  
- 支持在不同的页面使用(须配置不同的类型)
  
- 支持 api 接口使用

### 安装
```
composer require hnllyrp/laravel-captcha
```


### 配置
config/captcha.php
- 支持 type 默认 default, 算术 mathe, 背景图 image, 中文 chinese. 另可以自由组合支持更多配置
- 其他 配置 cache,session 可以使用 redis 驱动


### 使用

- web端 demo
```
<!-- captcha.blade.php -->
<input type="text" id="captcha" name="captcha" />
<img src="{{captcha_src()}}" onclick="this.src='{{captcha_src()}}'+Math.random()"/>


// 验证
$type = $request->input('type', 'default');
$validator = Validator::make($request->all(), [
     'captcha' => ['required', 'captcha:' . $type],
]);

// 或使用输助函数
if(!captcha_check($type, $value)){
 // 验证失败
}

```

- api端 demo
```
$.get("api/captcha",{}, function(data){
    var captcha = data.captcha; // base64图片
    var hash = data.hash; // 验证hash,验证接口须带上此参数
    
    $("#captcha_img").src(captcha);
});

// 前端需要把验证码的值与 hash值 去请求 后续的验证接口
// 后端接口验证
    $type = $request->input('type', 'default');
    $hash = $request->input('hash');
    $validator = Validator::make($request->all(), [
        'captcha' => ['required', 'captcha_api:' . $type . ',' . $hash],
    ]);

// 或使用输助函数
    if(!captcha_api_check($type, $value, $hash)){
        // 验证失败
    }
```



### 感谢：

- https://github.com/top-think/think-captcha
- https://github.com/mewebstudio/captcha
