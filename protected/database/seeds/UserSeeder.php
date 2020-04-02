<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = [
        	['name' => 'Admin',
             'email' => 'admin@mail.com', 
             'password' => bcrypt('adminadmin'),
            ],
        ];

        DB::table('users')->insert($users);
    
    }
}
