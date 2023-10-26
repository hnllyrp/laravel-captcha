<?php

namespace Hnllyrp\Captcha\Controllers;

use Hnllyrp\Captcha\Captcha;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class CaptchaController extends Controller
{
    /**
     * get Captcha web
     *
     * @param Captcha $captcha
     * @param string $type
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getCaptcha(Captcha $captcha, string $type = 'default')
    {
        return $captcha->create($type);
    }

    /**
     * 测试验证 Captcha web demo
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verifyCaptcha(Request $request)
    {
        $captcha_type = $request->input('captcha_type', 'default');
        $validator = Validator::make($request->all(), [
            'captcha' => ['required', 'captcha:' . $captcha_type],
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'code' => 200, 'message' => $validator->errors()->first()]);
        }

        return response()->json(['status' => 'success', 'code' => 200, 'message' => '验证成功']);
    }

    /**
     * get Captcha api
     *
     * @param Captcha $captcha
     * @param string $type
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getCaptchaApi(Captcha $captcha, string $type = 'default')
    {
        return $captcha->create($type, true);
    }

    /**
     * 测试验证 Captcha api demo
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verifyCaptchaApi(Request $request)
    {
        $captcha_type = $request->input('captcha_type', 'default');
        $captcha_hash= $request->input('captcha_hash');
        $validator = Validator::make($request->all(), [
            'captcha' => ['required', 'captcha_api:' . $captcha_type . ',' . $captcha_hash],
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'code' => 200, 'message' => $validator->errors()->first()]);
        }

        return response()->json(['status' => 'success', 'code' => 200, 'message' => '验证成功']);
    }
}
