<?php

namespace Glook\Modules\Vendor\Api\v1\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateVendorRequest extends FormRequest
{
    /**
     * Determine if the vendor is authorized to make this request.
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
            "vendor_name" => 'required|string|max:255',
            "email"       =>'required|string|email|max:255|unique:users',
            "phone"       => 'required|string|max:255',
            "address"     =>'required|string|max:255',
        ];
    }
}
