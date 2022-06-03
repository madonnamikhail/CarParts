<?php

namespace App\Http\Requests\Admin\Sellers;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Admin\SellersController;

class StoreSellerRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:sellers'],
            'phone' => ['required', 'regex:/^01[0125][0-9]{8}$/', 'unique:sellers'],
            'national_id'=>['required','integer','digits:14','unique:sellers'],
            'password' => ['required', 'string', "regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,32}$/", 'confirmed'],
            'password_confirmation' => ['required'],
            'status'=>['required','in:'.implode(',',SellersController::AVAILABLE_STATUS)],
            'email_verified_at'=>['required','in:'.implode(',',SellersController::AVAILABLE_STATUS)],
            'image'=>['nullable','max:1024','mimes:'.implode(',',SellersController::AVAILABLE_EXTENSIONS)],
            'gender'=>['required','in:m,f'],
            'social_links'=>['nullable','array'],
            'social_links.*.social_link'=>['nullable','url'],
            // 'shop'=>['required','array'],
            // 'shop.*.name'=>['required','max:255'],
            // 'shop.*.street'=>['required','max:255'],
            // 'shop.*.floor'=>['required','max:255'],
            // 'shop.*.building'=>['required','max:255'],
            // 'shop.*.notes'=>['nullable','string'],
            // 'shop.*.latitude'=>['required','max:20'],
            // 'shop.*.longitude'=>['required','max:20'],
            // 'shop.*.region_id'=>['required','integer','exists:regions,id'],
        ];
    }
}
