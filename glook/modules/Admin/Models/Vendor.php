<?php

namespace Glook\Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name','email','address','phone','website_link','payout_method','commission_percent'
    ];


    public $incrementing = false;


    public function users(){
      return $this->hasMany(User::class, 'users');
    }

    public function outlet(){
        return $this->hasMany(Outlet::class, 'outlets');
    }

    
}
