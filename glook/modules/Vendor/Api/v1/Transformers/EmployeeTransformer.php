<?php

namespace Glook\Modules\Vendor\Api\v1\Transformers;

use League\Fractal\TransformerAbstract;
use Glook\Modules\Vendor\Models\Employee;

class EmployeeTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Employee $employee)
    {
        return [
            "id" =>$employee->id,

            "status" =>$employee->status,
            "role_id" =>$employee->role_id,
            "user_id" =>$employee->user_id,
            "outlet_id" =>$employee->outlet_id,
        ];
    }
}
