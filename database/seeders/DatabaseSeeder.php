<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        $users  = User::factory(100)->create();

                foreach($users as $user)
                    {
                            $user->transactions()->create(['credit'=>500]);

                    }
    }







}
