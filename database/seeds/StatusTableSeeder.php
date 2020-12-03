<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Status;
class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $statuses = factory(Status::class)->times(100)->create();
    }
}
