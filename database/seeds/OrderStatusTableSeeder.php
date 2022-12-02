<?php

use Illuminate\Database\Seeder;

class OrderStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('name'=>'Ordered','is_active'=>1,'is_default'=>1,'is_end_status'=>0),
            array('name'=>'Sent','is_active'=>1,'is_default'=>0,'is_end_status'=>0),
            array('name'=>'Sent/payed','is_active'=>1,'is_default'=>0,'is_end_status'=>1),
            array('name'=>'Canceled','is_active'=>1,'is_default'=>0,'is_end_status'=>0)
        );
        DB::table('order_statuses')->insert($data);
    }
}
