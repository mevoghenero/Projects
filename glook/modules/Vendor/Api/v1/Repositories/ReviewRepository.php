<?php
namespace Glook\Modules\Vendor\Api\v1\Repositories;

use Glook\Modules\Vendor\Api\v1\Transformers\ReviewTransformer;
use Glook\Modules\Vendor\Models\Review;
use Glook\Modules\BaseRepository;

class ReviewRepository extends BaseRepository
{

     /**
      * @var Review
      */
     private  $review;

     /**
      * reviewRepository constructor.
      * @param Review $review
      */
     public function __construct(Review $review)
     {
          $this->review = $review;
     }

     public function index()
     {
          return $this->review->all();
     }

     /**
      * Handles creating reviews
      * @param array $reviewData
      * @return bool|\Illuminate\Http\JsonResponse
      * @throws \Exception
      */
     public function create(array $reviewData)
     {
          $data = (object) $reviewData;

          $review = Review::create([
               "id" => $this->generateUuid(),
               "customer_name" => $data->customer_name,
               "star" => $data->star,
               "review" => $data->review,
               "vendor_id" => $data->vendor_id

          ]);
          if ($review) {
               return $review;
          }
     }


     public function delete($id)
     {

          return   $this->review->where('id', $id)->delete();
     }
     public function getVendorId($vendor_id)
     {
          $review = $this->review->where('vendor_id', $vendor_id)->get();
          return $review;
     }
}
