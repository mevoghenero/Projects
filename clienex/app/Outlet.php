<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;
// use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
	protected $connection = 'mongodb';

    public function organisation()
    {
    	return $this->belongsTo(Organisation::class);
    }

    //  public function outlet()
    // {
    //     return $this->belongsTo(Outlet::class);
    // }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function product()
    {
    	return $this->hasOne(Product::class);
    }
}
