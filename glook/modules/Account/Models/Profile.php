<?php

namespace Glook\Modules\Account\Models;


use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    // protected $table = 'profiles';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','gender','address','city','state','image','user_id',
    ];



    public $incrementing = false;


    public function users(){
        return $this->belongsTo(User::class);
    }
}


