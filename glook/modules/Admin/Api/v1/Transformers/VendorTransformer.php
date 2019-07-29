<?php

namespace Glook\Modules\Admin\Api\v1\Transformers;

use League\Fractal\TransformerAbstract;
use Glook\Modules\Admin\Models\Vendor;

class VendorTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Vendor $vendor)
    {
        return [
            "id" =>$vendor->id,
            "name" =>$vendor->name,
            "email" =>$vendor->email,
            "address" =>$vendor->address,
            'phone' =>$vendor->phone,
            'website_link' =>$vendor->website_link,
            'payout_method' =>$vendor->payout_method,
            'commission_percent'=>$vendor->commission_percent,
        ];
    }
}
