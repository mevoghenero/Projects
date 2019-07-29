<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Category extends Model
{
    protected $connection = 'mongodb';
    protected $fillable = ['cat_name', 'cat_id'];

    public function product()
    {
    	return $this->belongsToMany(Product::class, 'product_categories');
    }
}
