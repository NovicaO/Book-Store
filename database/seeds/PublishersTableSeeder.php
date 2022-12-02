<?php

use Illuminate\Database\Seeder;

class PublishersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('name'=>'Publisher 1','is_active'=>1),
            array('name'=>'Publisher 2','is_active'=>1),
            array('name'=>'Publisher 3','is_active'=>0)

        );
        DB::table('publishers')->insert($data);
    }
}
