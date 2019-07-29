<?php

namespace Glook\Modules\Vendor\Api\v1\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOutletRequest extends FormRequest
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
            "name" =>'required',
            "email" =>'required',
            "address" =>'required',
            "city" =>'required',
            "state" =>'required',
            "phone" =>'required',
            // "vendor_id" =>'required',
        ];
    }
}
