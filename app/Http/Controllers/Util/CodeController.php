<?php

namespace App\Http\Controllers\Util;

use App\Exceptions\ValidException;
use App\Notifications\RegisterNotify;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CodeController extends Controller
{
    // 设定验证码过期时间
    protected $expire =600;
    // 发送邮件间隔时间
    protected $requestGap =60;
    
    public function send(Request $request)
    {
        $this->expireCheck();
        $code = rand_code();
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $type = 'email';
            $user = User::firstOrNew(['email' => $request->email]);
            $user->notify(new RegisterNotify($code));
        }
        $this->saveToSession($code, $type, $request->email);
        return ['code' => 1, 'message' => 'Verify code is sent, please check your email'];
    }
    
    
    public function saveToSession($code, $type, $email)
    {
        session()->put(
            'valid_code',
            [
                'code'  => $code,
                'type'  => $type,
                'email' => $email,
                'expired' => time() + $this->expire,
                'requestGap' => time() + $this->requestGap
            ]);
    }
    
    /**
     * 设置用户请求时间间隔
     */
    protected function expireCheck(){
        $requestGap = session('valid_code.requestGap');
        if($requestGap && time()< $requestGap){
            throw new ValidException('To many attempts，please try later',401);
        }
    }
    
    
}
