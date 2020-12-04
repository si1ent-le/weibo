<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //获取所有用户
        $users = User::all();
        //取出第一个用户
        $user = $users->first();
        //取出id
        $user_id = $user->id;
        //获取除ID为1的所有信息
        $followers = $users->slice(1);
        //以下只提取id字段，并存放至变量中
        $follower_ids = $followers->pluck('id')->toArray();

        $user->follow($follower_ids);

        foreach ($followers as $follower){
            $follower->follow($user_id);
        }
    }
}
