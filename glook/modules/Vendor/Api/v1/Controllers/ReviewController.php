<?php

namespace Glook\Modules\Vendor\Api\v1\Controllers;

use Glook\Modules\Vendor\Api\v1\Repositories\ReviewRepository;
use Glook\Modules\Vendor\Api\v1\Requests\CreateReviewRequest;
use Glook\Modules\Vendor\Api\v1\Transformers\ReviewTransformer;
use Glook\Modules\Vendor\Models\Review;
use Glook\Modules\BaseController;


class ReviewController extends BaseController
{
    /**
     * @var ReviewRepository
     */
    private $reviewRepository;


    /**
     * @var ReviewTransformer
     */
    private $reviewTransformer;


    /**
     * ReviewController constructor.
     * @param ReviewRepository $reviewRepository
     * @param ReviewTransformers $reviewTransformer
     */
    public function __construct(ReviewRepository $reviewRepository, ReviewTransformer $reviewTransformer) {
        $this->ReviewRepository = $reviewRepository;
        $this->ReviewTransformer = $reviewTransformer;
    }


    /**
     * Handles request for registering a new Employee
     * @param CreateReviewRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function create(CreateReviewRequest $request)
    {

        $review = $this->ReviewRepository->create($request->all());
        // $vendor->reviews()->save($review);
        if ($review) {
            return $this->transform($review, $this->ReviewTransformer);
        }

        return $this->error("error:Unable to create review");
    }

    public function index()
    {
        $review = $this->ReviewRepository->index();
        return $this->transform($review, $this->ReviewTransformer);
    }

    public function getById($id)
    {
        return $this->ReviewRepository->getById($id);
    }
    public function delete($id)
    {
        return  $this->ReviewRepository->delete($id);
    }
       public function getVendorId($vendor_id)
     {
        $review= $this->ReviewRepository->getVendorId($vendor_id);
        return $this->transform($review, $this->ReviewTransformer);
     }
}
