<?php

namespace App;


class Book extends Model
{
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }


    public function author(){
        return $this->belongsToMany(Author::class);
    }

    public function order(){
        return $this->belongsToMany(Order::class,'order_book');
    }


    public function scopeIsActive($query)
    {
        return $query->where('is_active', 0);
    }
    public function scopeIsInactive($query)
    {
        return $query->where('is_active', 1);

    }

    public function is_active(){
        if($this->is_active){
            return true;
        }
        return false;
    }







}
