<?php

namespace Glook\Modules\Vendor\Api\v1\Transformers;

use League\Fractal\TransformerAbstract;
use Glook\Modules\Vendor\Models\Review;

class ReviewTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Review $review)
    {
        return [
            "id"       => $review->id,
            "name"     => $review->customer_name,
            "star" => $review->star,
            "review"   => $review->review,
        ];
    }
}
