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
            'name'=>['array:en,ar'],
            'name.en'=>['required','max:32','unique_translation:models'],
            'name.ar'=>['required','max:32','unique_translation:models'],
            // 'year'=>['required','between:1970,2050'],
            'brand_id'=>['required','exists:brands,id'],
            'status'=>['required','in:'.implode(',',ModelsController::AVAILABLE_STATUS)],
            'image'=>['required','max:1024','mimes:png,jpg:'.implode(',',ModelsController::AVAILABLE_EXTENSIONS)]
        ];
    }
}
