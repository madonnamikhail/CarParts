<?php

namespace App\Http\Requests\Admin\Cities;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Admin\CitiesController;

class StoreCityRequest extends FormRequest
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
            'name'=>['required','max:32','unique:cities,name'],
            'status'=>['required','in:'.implode(',',CitiesController::AVAILABLE_STATUS)]
        ];
    }
}
