<?php

namespace Glook\Modules\Vendor\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name','email','phone','role_id','outlet_id'
    ];


    public $incrementing = false;
}
