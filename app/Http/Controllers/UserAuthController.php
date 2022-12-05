<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail; //寄信
use Illuminate\Support\Facades\Validator; //驗證器
use Illuminate\Support\Facades\Hash; //雜湊
use App\Http\Controllers\Controller;
use App\Shop\Entity\User; //使用者 Eloquent ORM Model
use Illuminate\Support\Facades\DB;

class UserAuthController extends Controller
{
    //註冊頁
    public function signUpPage()
    {
        $binding = [
            'title' => '註冊',
        ];
        return view('auth.signUp', $binding);
    }
    //處理註冊資料(User)
    public function signUpProcess()
    {
        //接收輸入資料
        $input = request()->all();
        //驗證規則
        $rules = [
            //暱稱
            'nickname' => [
                'required',
                'max:50',
            ],
            //Email
            'email' => [
                'required',
                'max:150',
                'email',
            ],
            //密碼
            'password' => [
                'required',
                'same:password_confirmation',
                'min:6',
            ],
            //密碼驗證
            'password_confirmation' => [
                'required',
                'min:6',
            ]
        ];
        //驗證資料
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            //資料驗證錯誤
            return redirect('/user/auth/sign-up')
                ->withErrors($validator)
                ->withInput();
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
        Mail::send(
            'email.signUpEmailNotification',
            $mail_binding,
            function ($mail) use ($input) {
                //收件人
                $mail->to($input['email']);
                //寄件人
                $mail->from('topic20210826@gmail.com');
                //郵件主旨
                $mail->subject('幸茶飲料專賣店 註冊完成通知');
            }
        );
        return redirect('/user/auth/sign-in');
    }
    //登入
    public function signInPage()
    {
        $binding = [
            'title' => '登入',
        ];
        return view('auth.signIn', $binding);
    }
    //處理登入資料
    public function signInProcess()
    {
        //接收輸入資料
        $input = request()->all();
        //驗證規則
        $rules = [
            //Email
            'email' => [
                'required',
                'max:150',
                'email',
            ],
            //密碼
            'password' => [
                'required',
                'min:6',
            ],
        ];
        //驗證資料
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            //資料驗證錯誤
            return redirect('/user/auth/sign-in')
                ->withErrors($validator)
                ->withInput();
        }
        //撈取使用者資料
        $User = User::where('email', $input['email'])->first();
        if (!$User) {
            //帳號錯誤回傳錯誤訊息
            $error_message = [
                'msg' => [
                    '此信箱不存在',
                ],
            ];
            return redirect('/user/auth/sign-in')
                ->withErrors($error_message)
                ->withInput();
        }
        //檢查密碼正確
        $is_password_correct = Hash::check($input['password'], $User->password);

        if (!$is_password_correct) {
            //密碼錯誤回傳訊息
            $error_message = [
                'msg' => [
                    '密碼驗證錯誤',
                ],
            ];
            return redirect('/user/auth/sign-in')
                ->withErrors($error_message)
                ->withInput();
        }
        //密碼驗證成功
        session()->put('user_id', $User->id);

        return redirect()->intended('/');
    }
    //處理登出資料
    public function signOut()
    {
        session()->forget('user_id');

        return redirect('/');
    }
    public function userdataPage()
    {
        $user_id = session()->get('user_id');
        $User = User::findOrFail($user_id);
        $binding = [
            'title' => '修改使用者資料',
            'User' => $User,
        ];
        return view('auth.userdata', $binding);
    }
    public function userdataProcess()
    {
        //接收輸入資料
        $input = request()->all();
        //驗證規則
        if ($input['nickname'] == '') {
            $rules = [
                //密碼
                'password' => [
                    'required',
                    'same:password_confirmation',
                    'min:6',
                ],
                //密碼驗證
                'password_confirmation' => [
                    'required',
                    'min:6',
                ]
            ];
        } elseif ($input['password'] == '' and $input['password_confirmation'] == '') {
            $rules = [
                'nickname' => [
                    'required',
                    'max:50',
                ],
            ];
        } else {
            $rules = [
                'nickname' => [
                    'required',
                    'max:50',
                ],
                //密碼
                'password' => [
                    'required',
                    'same:password_confirmation',
                    'min:6',
                ],
                //密碼驗證
                'password_confirmation' => [
                    'required',
                    'min:6',
                ]
            ];
        }

        //驗證資料
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            //資料驗證錯誤
            return redirect('/user/auth/userdata')->withErrors($validator)->withInput();
        }
        $email = request()->email;
        $User = User::where('email', $email)->first();
        DB::beginTransaction();
        if ($input['password'] != '' and $input['password_confirmation'] != '') {
            $input['password'] = Hash::make($input['password']);
            $password = $input['password'];
            $User->password =  $password;
        }
        //密碼加密
        if ($input['nickname'] != '') {
            $User->nickname =  $input['nickname'];
        }
        $User->save();
        DB::commit();
        return redirect('/user/auth/userdata');
    }
}
