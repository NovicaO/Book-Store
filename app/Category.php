<?php

namespace App;


class Category extends Model
{

    public $timestamps = false;

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function is_active()
    {
        if ($this->is_active) {
            return true;
        }
        return false;
    }
}
