<?php 

namespace App\Repositories\Authentication;


interface UserAuthenticationInterface
{
	public function login($attributes);
	
	public function getAuthenticatedUser();

	public function logout($attributes);
}