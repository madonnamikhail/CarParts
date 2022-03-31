<?php

namespace App\Http\Requests\Admin\Models;

use App\Http\Controllers\Admin\ModelsController;
use Illuminate\Foundation\Http\FormRequest;
use Barryvdh\Debugbar\DataCollector\ModelsCollector;

class UpdateModelRequest extends FormRequest
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
            'name'=>['required','max:32',"unique:brands,name,{$this->id},id"],
            'year'=>['required','max:32'],
            // 'brand_id'=>['required','exists:brands,id'],
            'status'=>['required','in:'.implode(',',ModelsController::AVAILABLE_STATUS)]
        ];
    }
}
