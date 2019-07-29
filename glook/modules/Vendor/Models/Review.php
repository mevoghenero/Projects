<?php

namespace Glook\Modules\Vendor\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'vendor_id', 'customer_name', 'review', 'star'
    ];


    public $incrementing = false;
}
