<?php

namespace Glook\Modules\Account\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','amount','reference','transaction_time','email','transaction_url','access_code','user_id','schedule_id','vendor_id'
    ];




    public $incrementing = false;

    public function users(){
        return $this->belongTo(User::class);
    }

    public function outlet(){
        return $this->belongTo(Outlet::class);
    }

    public function schedule(){
        return $this->belongTo(Schedule::class);
    }

    public function vendor(){
        return $this->belongTo(Vendor::class);
    }
}

