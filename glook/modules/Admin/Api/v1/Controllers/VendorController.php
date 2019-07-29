<?php

namespace Glook\Modules\Admin\Api\v1\Controllers;

use Glook\Modules\Admin\Api\v1\Repositories\VendorRepository;
use Glook\Modules\Admin\Api\v1\Requests\CreateVendorRequest;
use Glook\Modules\Admin\Api\v1\Requests\UpdateVendorRequest;
use Glook\Modules\Admin\Api\v1\Transformers\VendorTransformer;
use Glook\Modules\BaseController;

class VendorController extends BaseController
{
        /**
     * @var VendorRepository
     */
    private $vendorRepository;


    /**
     * @var VendorTransformer
     */
    private $vendorTransformer;


    /**
     * Controller constructor.
     * @param VendorRepository $vendorRepository
     * @param VendorTransformer $vendorTransformer
     */
    public function __construct(VendorRepository $vendorRepository,
                                VendorTransformer $vendorTransformer)
    {
        $this->vendorRepository = $vendorRepository;
        $this->vendorTransformer = $vendorTransformer;
    }


    /**
     * Handles request for registering a new vendor
     * @param CreateRoleRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function create(CreateVendorRequest $request){

        $vendor =    $this->vendorRepository->create($request->all());

      if($vendor)
          return $vendor;

      return $this->error("Unable to create schedule");

    }

    public function index()
	{
        $vendor = $this->vendorRepository->index(); 
        return $this->success($vendor, $this->vendorTransformer);
    }

    
	public function update(UpdateOrganisationRequest $request, $id)
	{
        $vendor = $this->vendorRepository->update($request->all(), $id);
        if($vendor)
        return $vendor;

       return $this->error("Unable to update schedule");

    }
    
    public function getById($id){
        return $this->vendorRepository->getById($id);
    }

	public function delete($id)
	{
        return  $this->vendorRepository->delete($id);
		
	}
}
