<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;
//use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $connection = 'mongodb';

	public function users()
	{
		return $this->belongsToMany(User::class);
	}

	public function admins()
	{
		return $this->belongsToMany(Admin::class);
	}
}
