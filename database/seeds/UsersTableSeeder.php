<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('users')->insert([
            'name' => 'User1',
            'email' => 'user1@email.com',
            'password' => bcrypt('password'),
            'role_id'=>1,
        ]);
        DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'user2@email.com',
            'password' => bcrypt('password'),
            'role_id' => 2,

        ]);
    }
}
