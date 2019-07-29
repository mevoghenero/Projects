<?php

namespace Glook\Modules\Account\Api\v1\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePaymentRequest extends FormRequest
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
            "amount"         =>'required|string',
            "reference"      =>'required|string',
            "email"          =>'required|string|email|max:255|unique:users',
            "transaction_time"      =>'required|string',
            "user_id"        =>'required|string',
            // 'outlet_id'      =>'required|string',
            'schedule_id'    =>'required|string',
            "vendor_id"      =>'required|string',
        ];
    }
}
