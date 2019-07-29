<?php
namespace Glook\Modules\Vendor\Api\v1\Controllers;

use Glook\Modules\Vendor\Api\v1\Repositories\VendorRepository;
use Glook\Modules\Vendor\Api\v1\Requests\CreateVendorRequest;
use Glook\Modules\Vendor\Api\v1\Requests\UpdateVendorRequest;
use Glook\Modules\Vendor\Api\v1\Transformers\VendorTransformer;
use Glook\Modules\BaseController;


class VendorController extends BaseController
{
    /**
     * @var VendorRepository
     */
    private $VendorRepository;


    /**
     * @var VendorTransformer
     */
    private $VendorTransformer;


    /**
     * VendorController constructor.
     * @param VendorRepository $VendorRepository
     * @param VendorTransformer $VendorTransformer
     */
    public function __construct(
        VendorRepository $VendorRepository,
        VendorTransformer $VendorTransformer
    ) {
        $this->VendorRepository = $VendorRepository;
        $this->VendorTransformer = $VendorTransformer;
    }


    /**
     * Handles request for registering a new Vendor or uisness
     * @param CreateVendorRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function create(CreateVendorRequest $request)
    {

        $Vendor =$this->VendorRepository->create($request->all());

        if ($Vendor)
            return $Vendor;

        return $this->error("Unable to create Buisness or Vendor Account");
    }

    public function index()
    {
        $vendor = $this->VendorRepository->index();
        return $this->success($vendor, $this->VendorTransformer);
    }


    public function getById($id)
    {
        return $this->VendorRepository->getById($id);
    }

    public function update(UpdateVendorRequest $request, $id)
    {
        $Vendor = $this->VendorRepository->update($request->all(), $id);
        if ($Vendor)
            return $Vendor;

        return $this->error("Unable to update schedule");
    }

}
