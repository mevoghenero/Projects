<?php

namespace Glook\Modules\Admin\Api\v1\Transformers;

use League\Fractal\TransformerAbstract;
use Glook\Modules\Admin\Models\Role;

class RoleTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Role $role)
    {
        return [
            "id" =>$role->id,
            "name" =>$role->name,
            "display_name" =>$role->display_name,
        ];
    }
}
