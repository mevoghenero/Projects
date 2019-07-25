<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class ProductCategory extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'product_categories';
}
