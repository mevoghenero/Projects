<?php

namespace Glook\Modules\Vendor\Api\v1\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReviewRequest extends FormRequest
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
            "customer_name" => 'required',
            "star" => 'required||integer||between:0,5',
            "review" => 'required',
            "vendor_id" => 'required',
        ];
    }
}
