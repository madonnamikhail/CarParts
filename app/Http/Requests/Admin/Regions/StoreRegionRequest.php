<?php

namespace App\Http\Requests\Admin\Regions;

use App\Http\Controllers\Admin\RegionsController;
use Illuminate\Foundation\Http\FormRequest;

class StoreRegionRequest extends FormRequest
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
            'name'=>['array:en,ar'],
            'name.en'=>['required','max:32'],
            'name.ar'=>['required','max:32'],
            'status'=>['required','in:'.implode(',',RegionsController::AVAILABLE_STATUS)],

        ];
    }
}
