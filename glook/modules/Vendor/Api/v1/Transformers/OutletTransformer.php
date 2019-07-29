<?php

namespace Glook\Modules\Vendor\Api\v1\Transformers;

use League\Fractal\TransformerAbstract;
use Glook\Modules\Vendor\Models\Outlet;

class OutletTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Outlet $outlet)
    {
        return [
            "id" =>$outlet->id,
            "name" =>$outlet->name,
            "email" =>$outlet->email,
            "address" =>$outlet->address,
            "city" =>$outlet->city,
            "state" =>$outlet->state,
            "phone" =>$outlet->phone,
            "vendor_id" =>$outlet->vendor_id,
        ];
    }
}
