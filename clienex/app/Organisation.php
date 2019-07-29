<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;
// use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
	protected $connection = 'mongodb';

	public function outlet()
	{
		return $this->hasMany(Outlet::class);
	}

	public function user()
	{
		return $this->hasMany(User::class);
	}

	public function admin()
	{
		return $this->hasOne(Admin::class);
	}
}
