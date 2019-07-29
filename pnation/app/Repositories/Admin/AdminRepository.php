<?php

namespace App\Repositories\Admin;

use App\Http\Resources\Admin\Admin as AdminResources;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\JWTAuth;


class AdminRepository implements AdminRepositoryInterface {

    protected $admin;

    public function __construct(User $admin){
       $this->admin = $admin;
    }

    public function getAll()
    {
        $admins = $this->admin->where('role', 'admin')->get();
		return $admins; 
    }

    public function getById($id)
	{
		return User::findOrFail($id);
	}

    public function createAdmin($attributes){
        Validator::make($attributes->all(), [
            'first_name'   => 'required|string|max:150',
            'last_name'    => 'required|string|max:150',
            'email' 	   => 'required|string|email|unique:user',
            'city' 		   => 'required|max:30',
            'state' 	   => 'required|max:30',
            'phone' 	   => 'required|max:12',
            'password'     => 'required|string|min:6',
            'address'      => 'required|max:60',
        ]);
        
        $admin = User::create([
			'first_name' => $attributes['first_name'],
			'last_name'  => $attributes['last_name'],
			'email' 	 => $attributes['email'],
			'phone' 	 => $attributes['phone'],
			'address' 	 => $attributes['address'],
			'city' 		 => $attributes['city'],
			'state' 	 => $attributes['state'],
			'role' 	  	 => 'admin',
			'password' 	 => Hash::make($attributes['password'])
        ]);
        	
			$token = \JWTAuth::fromUser($admin);
			return new AdminResources($admin, $token);
        
    }

    public function updateAdmin($attributes, $id){
        $admin = $this->admin->findOrFail($id);
		$admin->update($attributes);
		return $admin;   
    }

    public function deleteAdmin($id)
	{
		return $this->admin->destroy($id);
	}

}
