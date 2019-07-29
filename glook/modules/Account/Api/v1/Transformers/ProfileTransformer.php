<?php

namespace Glook\Modules\Account\Api\v1\Transformers;

use League\Fractal\TransformerAbstract;
use Glook\Modules\Account\Models\Profile;

class ProfileTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Profile $profile)
    {
        return [
            "id"      =>$profile->id,
            "gender"  =>$profile->gender,
            "address" =>$profile->address,
            "city"    =>$profile->city,
            "state"   =>$profile->state,
            "image"   =>$profile->image,
            "user_id" =>$profile->user_id,
        ];
    }
}
