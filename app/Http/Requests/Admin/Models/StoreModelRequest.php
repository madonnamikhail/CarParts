<?php

namespace App\Http\Requests\Admin\Models;

use App\Http\Controllers\Admin\ModelsController;
use Illuminate\Foundation\Http\FormRequest;

class StoreModelRequest extends FormRequest
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
            'year'=>['required'],
            'brand_id'=>['required','exists:brands,id'],
            'status'=>['required','in:'.implode(',',ModelsController::AVAILABLE_STATUS)]
        ];
    }
}
