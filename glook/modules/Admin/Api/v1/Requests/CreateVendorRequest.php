<?php

namespace Glook\Modules\Admin\Api\v1\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateVendorRequest extends FormRequest
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
            "name"              => 'required|string|max:255',
            "email"             => 'required|string|email|max:255|unique:organisations',
            "address"           => 'required|string|max:255',
            'phone'             => 'required|max:15',
            'website_link'      => 'required|string|active_url',
            'payout_method'    => 'required|in:salary,commission',
            'commission_percent' => 'required|string',
        ];
    }
}
