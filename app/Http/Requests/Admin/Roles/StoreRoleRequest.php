<?php

namespace App\Http\Requests\admin\Roles;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
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
            //
            'name'=>['required','unique:roles,id,'],
            'permission_id'=>['required','array'],
            'permission_id.*'=>['integer','exists:permissions,id'],
        ];
    }
}
