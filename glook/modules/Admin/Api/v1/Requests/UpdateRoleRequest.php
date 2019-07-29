<?php

namespace Glook\Modules\Admin\Api\v1\Requests;

// use Illuminate\Foundation\Http\FormRequest;
use Dingo\Api\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
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
            "name" => 'required|max:255',
            "display_name" => 'required|max:255',
        ];
    }
}
