<?php

namespace Glook\Modules\Vendor\Api\v1\Controllers;

use Glook\Modules\Vendor\Api\v1\Repositories\OutletRepository;
use Glook\Modules\Vendor\Api\v1\Requests\CreateOutletRequest;
use Glook\Modules\Vendor\Api\v1\Requests\UpdateOutletRequest;
use Glook\Modules\Vendor\Api\v1\Transformers\OutletTransformer;
use Glook\Modules\BaseController;

class OutletController extends BaseController
{
    /**
     * @var OutletRepository
     */
    private $outletRepository;


    /**
     * @var OutletTransformer
     */
    private $outletTransformer;


    /**
     * OutletController constructor.
     * @param OutletRepository $outletRepository
     * @param OutletTransformer $outletTransformer
     */
    public function __construct(
        OutletRepository $outletRepository,
        OutletTransformer $outletTransformer
    ) {
        $this->outletRepository = $outletRepository;
        $this->outletTransformer = $outletTransformer;
    }


    /**
     * Handles request for registering a new Outlet
     * @param CreateOutletRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function create(CreateOutletRequest $request)
    {

        $outlet =    $this->outletRepository->create($request->all());

        if ($outlet)
            return $outlet;

        return $this->error("Unable to create outlet");
    }

    public function index()
    {
        $outlet = $this->outletRepository->index();
        return $this->success($outlet, $this->outletTransformer);
    }


    public function getById($id)
    {
        return $this->outletRepository->getById($id);
    }

    public function update(UpdateOutletRequest $request, $id)
    {
        $outlet = $this->outletRepository->update($request->all(), $id);
        if ($outlet)
            return $outlet;

        return $this->error("Unable to update schedule");
    }

    public function delete($id)
    {
        return  $this->outletRepository->delete($id);
    }
    public function getVendorId($vendor_id)
    {
        $review = $this->outletRepository->getVendorId($vendor_id);
        return $this->transform($review, $this->outletTransformer);
    }
}
