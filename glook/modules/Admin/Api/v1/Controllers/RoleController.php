<?php

namespace Glook\Modules\Admin\Api\v1\Controllers;

use Glook\Modules\Admin\Api\v1\Repositories\RoleRepository;
use Glook\Modules\Admin\Api\v1\Requests\CreateRoleRequest;
use Glook\Modules\Admin\Api\v1\Requests\UpdateRoleRequest;
use Glook\Modules\Admin\Api\v1\Transformers\RoleTransformer;
use Glook\Modules\BaseController;

class RoleController extends BaseController
{
   
     /**
     * @var RoleRepository
     */
    private $roleRepository;


    /**
     * @var RoleTransformer
     */
    private $roleTransformer;


    /**
     * RoleController constructor.
     * @param RoleRepository $roleRepository
     * @param RoleTransformer $roleTransformer
     */
    public function __construct(RoleRepository $roleRepository,
                                RoleTransformer $roleTransformer)
    {
        $this->roleRepository = $roleRepository;
        $this->roleTransformer = $roleTransformer;
    }


    /**
     * Handles request for registering a new role
     * @param CreateRoleRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function create(CreateRoleRequest $request){

      $role =    $this->roleRepository->create($request->all());

      if($role)
          return $role;

      return $this->error("Unable to create role");

    }

    public function index()
	{
        $role = $this->roleRepository->index(); 
        return $this->success($role, $this->roleTransformer);
    }

    
	public function update(UpdateRoleRequest $request, $id)
	{
        $role = $this->roleRepository->update($request->all(), $id);
        if($role)
        return $role;

       return $this->error("Unable to update schedule");

    }
    
    public function getById($id){
        return $this->roleRepository->getById($id);
    }

	public function delete($id)
	{
        return  $this->roleRepository->delete($id);
		
    }
    
    public function assignRole($role)
    {
        return $this->roles()->sync(
            [Role::whereName($role)->firstOrFail()->id]
        );
    }
}
