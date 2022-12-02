<?php

namespace App;


class Author extends Model
{
//    protected $primaryKey='author_id';
    public $timestamps=false;


    public function books(){
        return $this->belongsToMany(Book::class);
    }
}
