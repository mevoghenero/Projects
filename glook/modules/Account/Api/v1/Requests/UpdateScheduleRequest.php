<?php

namespace Glook\Modules\Account\Api\v1\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UpdateScheduleRequest extends FormRequest
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
            "service_name"     =>'required|string|max:255',
            "price"            =>'required|string',
            "appointment_date" =>'required|string',
            "appointment_time" =>'required|string',
            "service_id"       =>'required|string',
            "outlet_id"        =>'required|string',
        ];
    }
}
