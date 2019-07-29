<?php

namespace Glook\Modules\Account\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'service_name','price','appointment_date','appointment_time','user_id','service_id','outlet_id'
    ];


    public $incrementing = false;

    public function services(){
        return $this->has(Service::class);
    }

    public function payment(){
        return $this->has(Payment::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function outlet(){
        return $this->belongsTo(Outlet::class);
    }

}
