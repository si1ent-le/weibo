<?php

use Illuminate\Database\Seeder;
use App\Models\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
        {
            //
            factory(User::class)->times(50)->create();

            $user = User::find(1);
            $user->name = 'si1ent';
            $user->email = 'si1ent@qq.com';
            $user->save();
        }
}