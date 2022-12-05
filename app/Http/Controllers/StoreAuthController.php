<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail; //寄信
use Illuminate\Support\Facades\Validator; //驗證器
use Illuminate\Support\Facades\Hash; //雜湊
use App\Http\Controllers\Controller;
use App\Shop\Entity\User; //使用者 Eloquent ORM Model
use Illuminate\Support\Facades\DB;

class StoreAuthController extends Controller {
    //註冊頁
    public function signUpPage(){
        $binding = [
            'title' => '註冊管理員',
        ];
        return view('auth.storesignUp', $binding);
    }
    //處理註冊資料(User)
    public function signUpProcess(){
        //接收輸入資料
        session_start();
        $_SESSION['check']='123456';
        $input = request()->all();
        //驗證規則
        $rules = [
            //暱稱
            'nickname'=> [
                'required',
                'max:50',
            ],
            //Email
            'email'=> [
                'required',
                'max:150',
                'email',
            ],
            //密碼
            'password' => [
                'required' ,
                'min:6',
            ],
            //確認驗證碼
            'password_check' => [
                'required' ,
                'min:6',
            ]
        ];
        //驗證資料
        $validator = Validator::make($input, $rules);
        if($validator->fails()){
            //資料驗證錯誤
            return redirect('/user/auth/sign-up')->withErrors($validator)->withInput();
        }
        $email = request()->email;
        $dbUser = User::where('email', $email)->first();
        if ($dbUser) {
            $error_message = [
                'msg' => [
                    '信箱已經重複了',
                ],
            ];
            return redirect('/user/auth/sign-up')
                ->withErrors($error_message)
                ->withInput();
        }
        if(($input['password_check']) != $_SESSION['check']){
            $error_message = [
                'msg' => [
                    '錯誤驗證碼',
                ],
            ];
            return redirect('/user/auth/sign-up')
                ->withErrors($error_message)
                ->withInput();
        }
        //密碼加密
        $input['password'] = Hash::make($input['password']);
        if (!$dbUser) {
            //新增會員資料
            $Users = User::create($input);
        }
        //var_dump($Users);
        //寄送註冊通知
        $mail_binding = [
            'nickname' => $input['nickname']
        ];
        Mail::send('email.signUpEmailNotification', $mail_binding,
        function($mail) use ($input){
            //收件人
            $mail->to($input['email']);
            //寄件人
            $mail->from('topic20210826@gmail.com');
            //郵件主旨
            $mail->subject('幸茶飲料專賣店 管理者帳號註冊完成通知');
        });
        return redirect('/user/auth/sign-in');
    }
}
