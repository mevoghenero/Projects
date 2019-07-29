<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = ['name', 'slug', 'description'];

	public function subject()
	{
		return $this->hasMany(Subject::class, 'cat_id');
	}

}
