<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
	use Notifiable;

	protected $fillable = [
		'user_id',  'start_when', 'no_student', 'weeks', 'duration', 'hours', 'time', 'referral', 'level',
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
	
}
