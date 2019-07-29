<?php

namespace Glook\Modules\Account\Api\v1\Controllers;

use Glook\Modules\Account\Api\v1\Repositories\ProfileRepository;
use Glook\Modules\Account\Api\v1\Repositories\UserRepository;
use Glook\Modules\Account\Api\v1\Requests\CreateProfileRequest;
use Glook\Modules\Account\Api\v1\Requests\UpdateProfileRequest;
use Glook\Modules\Account\Api\v1\Transformers\ProfileTransformer;
use Glook\Modules\BaseController;

class ProfileController extends BaseController
{
      /**
     * @var ProfileRepository
     */
    private $profileRepository;


    /**
     * @var ProfileTransformer
     */
    private $profileTransformer;


    /**
     * ProfileController constructor.
     * @param ProfileRepository $profileRepository
     * @param ProfileTransformer $profileTransformer
     */
    public function __construct(ProfileRepository $profileRepository,
    ProfileTransformer $profileTransformer)
    {
        $this->profileRepository = $profileRepository;
        $this->profileTransformer = $profileTransformer;
    }



    public function index()
	{
        $profile = $this->profileRepository->index(); 
        return $this->success($profile, $this->profileTransformer);
    }


    public function getById($id){
        return $this->profileRepository->getById($id);
    }

    public function update(UpdateProfileRequest $request, $id)
	{
        $profile = $this->profileRepository->update($request->all(), $id);
        if($profile)
        return $profile;

       return $this->error("Unable to update Profile");
       
	}

	public function delete($id)
	{
        return  $this->profileRepository->delete($id);
		
	}
}
