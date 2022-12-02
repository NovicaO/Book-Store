<?php

use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('name'=>'Dollar','is_default'=>0,'symbol'=>'$'),
            array('name'=>'Euro','is_default'=>0,'symbol'=>'€'),
            array('name'=>'Serbian dinar','is_active'=>1,'symbol'=>'RSD'),

        );
        DB::table('currencies')->insert($data);
    }
}
