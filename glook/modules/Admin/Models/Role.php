<?php

namespace Glook\Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    
    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array
    //  */
    // protected $fillable = [
    //     'id', 'name','display_name',
    // ];


    public $incrementing = false;

    protected $table = 'roles'; 

    public function users()
	{
        return $this->belongsToMany(User::class);
        // return $this->hasMany('Glook\Models\User', 'role_id', 'id');
	}

	// public function admins()
	// {
	// 	return $this->belongsToMany(Admin::class);
    // }
    
    // public function permissions() {
    //     return $this->belongsToMany(Permission::class,'roles_permissions');
    //  }
}
