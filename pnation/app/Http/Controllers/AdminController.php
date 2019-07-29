<?php

namespace App\Http\Controllers;

use App\Http\Resources\Admin\Admin as AdminResources;
use App\Http\Resources\UserLogin;
use App\Repositories\Admin\AdminRepositoryInterface;
use App\Repositories\Authentication\UserAuthenticationInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $admin;
	protected $auth;

	public function __construct(AdminRepositoryInterface $admin, UserAuthenticationInterface $auth)
	{
		$this->admin = $admin;
		$this->auth = $auth;
	}

	public function getAll()
	{
		$admins = $this->admin->getAll();
		return AdminResources::collection($admins);
	}

	public function getAuthUser()
	{
		$authUser = $this->auth->getAuthenticatedUser();
		return $authUser;
	}

	public function login(Request $request)
	{
		$admin = $this->auth->login($request);
		return new AdminResources($admin);
	}

	public function createAdmin(Request $request)
	{
		//dd($request->all());
		$admin = $this->admin->createAdmin($request);
		return new AdminResources($admin);
	}

	public function getById($id)
	{
		$admin = $this->admin->getById($id);
		return new AdminResources($admin);	
	}

	public function updateAdmin(Request $request, $id)
	{
		$admin = $this->admin->updateAdmin($request, $id);
		return new AdminResources($admin);
	}

	public function deleteAdmin($id)
	{
		return $this->admin->deleteAdmin($id);
	}
}
