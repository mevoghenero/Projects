<?php 

namespace App\Repositories\Authentication;

use App\User;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;

/**
 * 
 */
class UserAuthentication implements UserAuthenticationInterface
{
	protected $auth;
	
	function __construct(User $auth)
	{
		$this->auth = $auth;
	}

	public function login($attributes)
	{

		$credentials = $attributes->only('email', 'password');
		// dd($attributes);
		try {
			if (! $token = \JWTAuth::attempt($credentials)) {
				return response()->json(['error' => 'invalid_credentials'], 400);
			}
		} catch (JWTException $e) {
			return response()->json(['error' => 'could_not_create_token'], 500);
		}

		return response()->json(compact('token'));
		
	}

	public function getAuthenticatedUser()
	{
		try {

			if (! $user = \JWTAuth::parseToken()->authenticate()) {
				return response()->json(['user_not_found'], 404);
			}

		} catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

			return response()->json(['token_expired'], $e->getStatusCode());

		} catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

			return response()->json(['token_invalid'], $e->getStatusCode());

		} catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

			return response()->json(['token_absent'], $e->getStatusCode());

		}

		return response()->json(compact('user'));
	}

	public function logout($attributes)
	{
		$logout = $this->auth->findOrFail($attributes);
		$logout->delete();
		return $logout;
	}
}