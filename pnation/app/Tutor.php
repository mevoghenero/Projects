<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $fillable = [
    	'nin', 'course', 'gender', 'facebook', 'about_me',
    	 'attach_cv','referral', 'user_id'
    ];

    public function user()
	{
		return $this->belongsTo(User::class);
	}
	
}
