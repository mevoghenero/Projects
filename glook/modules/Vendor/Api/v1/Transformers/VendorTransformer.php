<?php

namespace Glook\Modules\Vendor\Api\v1\Transformers;

use League\Fractal\TransformerAbstract;
use Glook\Modules\Vendor\Models\Vendor;

class VendorTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Vendor $Vendor)
    {
        return [
            "id" => $Vendor->id,
            "vendor_name" => $Vendor->name,
            "email" => $Vendor->email,
            "phone"=> $Vendor->phone,
        ];
    }
}
