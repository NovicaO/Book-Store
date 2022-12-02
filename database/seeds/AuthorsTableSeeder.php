<?php

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('name'=>'Author 1','is_active'=>1),
            array('name'=>'Author 2','is_active'=>1),
            array('name'=>'Author 3','is_active'=>0),

        );
        DB::table('authors')->insert($data);
    }
}
