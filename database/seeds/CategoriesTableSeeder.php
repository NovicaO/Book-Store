<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('name'=>'Category 1','is_active'=>1),
            array('name'=>'Category 2','is_active'=>1),
            array('name'=>'Category 3','is_active'=>0),

        );
        DB::table('categories')->insert($data);
    }
}
