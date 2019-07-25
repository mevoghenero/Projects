<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class ProductType extends Model
{
    protected $collection = 'product_types';
    protected $fillable = ['name', 'typeid'];

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}
