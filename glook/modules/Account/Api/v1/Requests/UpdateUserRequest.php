<?php

namespace Glook\Modules\Account\Api\v1\Requests;



use Dingo\Api\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "first_name" =>'required|string|max:255',
            "last_name"  =>'required|string|max:255',
            "phone"      =>'max:15',
            "gender"     =>'required',
            "address"    =>'required|string|max:255',
            "city"       =>'required|string|max:255',
            "state"      =>'string|max:255',
            "image"      =>'required|string',
        ];
    }
}