<?php

namespace Glook\Modules\Vendor\Models;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name','email','address','city','state','phone','vendor_id'
    ];


    public $incrementing = false;

    public function vendor(){
        return $this->belongTo(Vendor::class);
    }
}
