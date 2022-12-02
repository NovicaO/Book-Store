<?php

namespace App;


class Order extends Model
{
    public function book(){
        return $this->belongsToMany(Book::class,'order_book')->withPivot('order_items', 'order_total');;
    }


    public function status()
    {
        return $this->belongsTo(OrderStatus::class);
    }
}
