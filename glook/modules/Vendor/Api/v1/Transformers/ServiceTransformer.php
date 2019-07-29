<?php

namespace Glook\Modules\Vendor\Api\v1\Transformers;

use League\Fractal\TransformerAbstract;
use Glook\Modules\Vendor\Models\Service;

class ServiceTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Service $service)
    {
        return [
            "id" =>$service->id,
            "name" =>$service->name,
            "description" =>$service->description,
            "price" =>$service->price,
            "outlet_id" =>$service->outlet_id,
        ];
    }
}
