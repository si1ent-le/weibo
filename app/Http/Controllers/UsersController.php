<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
            'except' => ['show','create','store']
        ]);
        //只允许未登录账户访问注册页
        $this->middleware('guest',[
            'only' => ['create']
        ]);
    }
    //
    public function create()
    {
        return view('users.create');
    }
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:users|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'

        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
            Auth::login($user);
            session()->flash('success','你已经注册成功了！');
            return redirect()->route('users.show',[$user]);
    }
    public function edit(User $user)
    {
        $this->authorize('update',$user);
        //创建一个包含变量与其值的数组。
        return view('users.edit',compact('user'));
    }

    public function update(User $user , Request $request)
    {
        $this->authorize('update',$user);
        $this->validate($request,[
            'name' => 'required|max:50',
            'password' => 'nullable|confirmed|min:6'
        ]);
        $data = [];
        $data['name'] = $request->name;
       if ($request->password)
       {
            $data['password'] = bcrypt($request->password);
       }
        $user->update($data);
        session()->flash('success','资料更新完成！');
        return redirect()->route('users.show',$user->id);
    }
}
