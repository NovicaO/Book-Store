<?php

namespace App;


class Publisher extends Model
{
//    protected $primaryKey='publisher_id';
    public $timestamps=false;


    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
