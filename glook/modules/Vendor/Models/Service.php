<?php

namespace Glook\Modules\Vendor\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name','description','price', 'outlet_id'
    ];


    public $incrementing = false;
}
