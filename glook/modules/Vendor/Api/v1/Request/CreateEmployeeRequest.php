<?php

namespace Glook\Modules\Vendor\Api\v1\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
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
            // "phone" =>'required',
            "role_id" =>'required',
            "outlet_id" =>'required',
            "user_id" =>'required',
        ];
    }
}
