<?php


namespace Glook\Modules\Account\Api\v1\Transformers;


use League\Fractal\TransformerAbstract;
use Glook\Modules\Account\Models\User;

class UserTransformer extends TransformerAbstract
{

    public function transform(User $user){
        return [
            "id"            => $user->id,
            "first_name"    => $user->first_name,
            "last_name"     => $user->last_name,
            "email"         => $user->email,
            "phone"         => $user->phone,
            "role_id"       => $user->role_id,
            "password"      => $user->password,
        ];
    }
}
