<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;


class FollowersController extends Controller
{
    //只有用户登录后才能访问到关注和取消关注对应视图，
    public function __construct()
    {
        $this->middleware('auth');
    }
    //添加关注动作
    public function store(User $user)
    {
        $this->authorize('follow',$user);
        if (! Auth::user()->isFollowing($user->id)){
            Auth::user()->follow($user->id);
        }
        return redirect()->route('users.show',$user->id);
    }

    //添加取消关注按钮
    public function destroy(User $user)
    {
        $this->authorize('follow',$user);

        if (Auth::user()->isFollowing($user->id)) {
            Auth::user()->unfollow($user->id);
        }
        return redirect()->route('users.show',$user->id);
    }
}

