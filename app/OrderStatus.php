<?php

namespace App;


class OrderStatus extends Model
{
    public $timestamps=false;


    public function isDefault(){
        $this->where('is_default',1);
    }
}
