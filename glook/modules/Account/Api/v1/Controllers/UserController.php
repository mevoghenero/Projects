<?php

namespace Glook\Modules\Account\Api\v1\Controllers;


use Glook\Modules\Account\Api\v1\Repositories\UserRepository;
use Glook\Modules\Account\Api\v1\Requests\RegistrationRequest;
use Glook\Modules\Account\Api\v1\Requests\UpdateUserRequest;
use Glook\Modules\Account\Api\v1\Requests\LoginRequest;
use Glook\Modules\Account\Api\v1\Transformers\UserTransformer;
use Glook\Modules\BaseController;

class UserController extends BaseController
{

    /**
     * @var UserRepository
     */
    private $userRepository;


    /**
     * @var UserTransformer
     */
    private $userTransformer;


    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     * @param UserTransformer $userTransformer
     */
    public function __construct(UserRepository $userRepository, UserTransformer $userTransformer)
    {
        $this->userRepository = $userRepository;
        $this->userTransformer = $userTransformer;
    }


    /**
     * Handles request for registering a new user
     * @param RegistrationRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function register(RegistrationRequest $request){
      $user =    $this->userRepository->register($request->all());

      if($user)
          return $user;

      return $this->error("Registration failed");

    }


    /**
     * Handles request for logging in users
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request){
        return $this->userRepository->login($request->all());
    }

    public function index(){
        $user = $this->userRepository->index();
        return $this->success($user, $this->userTransformer);
    }


    public function getById($id){
        return $this->userRepository->getById($id);
    }

    public function update(UpdateUserRequest $request, $id)
	{
        $user = $this->userRepository->update($request->all(), $id);
        if($user)
        return $user;

        return $this->error("Unable to update user");
       
	}

	public function delete($id)
	{
        return  $this->userRepository->delete($id);
		
	}
}
