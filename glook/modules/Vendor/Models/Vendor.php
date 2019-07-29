<?php

namespace Glook\Modules\Vendor\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'vendor_name', 'email', 'phone', 'address'
    ];


    public $incrementing = false;
}
