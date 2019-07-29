<?php
namespace Glook\Modules\Vendor\Api\v1\Controllers;

use Glook\Modules\Vendor\Api\v1\Repositories\ServiceRepository;
use Glook\Modules\Vendor\Api\v1\Requests\CreateServiceRequest;
use Glook\Modules\Vendor\Api\v1\Requests\UpdateServiceRequest;
use Glook\Modules\Vendor\Api\v1\Transformers\ServiceTransformer;
use Glook\Modules\BaseController;

class ServiceController extends BaseController
{

      /**
     * @var OutletRepository
     */
    private $outletRepository;


    /**
     * @var ServiceTransformer
     */
    private $serviceTransformer;


    /**
     * ServiceController constructor.
     * @param ServiceRepository $serviceRepository
     * @param ServiceTransformer $serviceTransformer
     */
    public function __construct(ServiceRepository $serviceRepository,
    ServiceTransformer $serviceTransformer)
    {
        $this->serviceRepository = $serviceRepository;
        $this->serviceTransformer = $serviceTransformer;
    }


    /**
     * Handles request for registering a new Service
     * @param CreateEmployeeRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function create(CreateServiceRequest $request){

      $service =    $this->serviceRepository->create($request->all());

      if($service)
          return $service;

      return $this->error("Unable to create schedule");

    }

    public function index()
	{
        $service = $this->serviceRepository->index(); 
        return $this->success($service, $this->serviceTransformer);
    }


    public function getById($id){
        return $this->serviceRepository->getById($id);
    }

    public function update(UpdateServiceRequest $request, $id)
	{
        $service = $this->serviceRepository->update($request->all(), $id);
        if($service)
        return $service;

       return $this->error("Unable to update schedule");
       
	}

	public function delete($id)
	{
        return  $this->serviceRepository->delete($id);
		
	}
}

