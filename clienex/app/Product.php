<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Product extends Model
{
    protected $collection = 'products';

    public function type()
    {
    	return $this->hasMany(ProductType::class);
    }

    public function category()
    {
    	return $this->belongsToMany(Category::class, 'product_categories');
    }

    public function outlet()
    {
    	return $this->belongsTo(Outlet::class);
    }
}
