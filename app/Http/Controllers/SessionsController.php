<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest',[
            'only' => ['create']
        ]);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $credentials = $this->validate($request,[
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            if (Auth::user()->activated) {
            //匹配成功登录
                session()->flash('success','Welcome Back!');
                $fallback = route('users.show',Auth::user());
                return redirect()->intended($fallback);
            } else {
                Auth::logout();
                session()->flash('warnig','你的账号未激活，请检查邮箱中的注册邮件进行激活。');
                return redirect('/') ;
            }
        }   else{
            //匹配失败无法登录
            session()->flash('danger','邮箱或密码不匹配!');
            return redirect()->back()->withInput();
            }
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success','退出成功');
        return redirect('login');
    }
}
