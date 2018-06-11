<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'product_name', 'slug', 'image', 'description'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
