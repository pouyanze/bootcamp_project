<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdsValidationRequest extends FormRequest
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
            'title' => 'required|string|max:15',
            'description' => 'required|string|max:255',
            'price' => 'required|integer|min:1|max:255',
            'address' => 'required|string|max:255',
            'phoneNumber' => 'required|integer|max:255',
            'userID' => 'required',
            'categoryID' => 'required',
        ];
    }
}
