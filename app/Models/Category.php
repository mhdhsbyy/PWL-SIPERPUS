<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category'
    ];

    public function bookshelf(){
        return $this->hasMany(Book::class, 'category_id', 'id');
    }
}
