<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('display_name'=>'Administrator','is_active'=>1,'type'=>'Administrator'),
            array('display_name'=>'Moderator','is_active'=>1,'type'=>'Moderator')
        );
        DB::table('roles')->insert($data);
    }
}
