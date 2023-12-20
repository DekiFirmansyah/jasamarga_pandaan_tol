<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'foto' => 'image|mimes:png,jpg,jpeg,svg|max:2048',
            'foto_cover' => 'image|mimes:png,jpg,jpeg,svg|max:2048',
            'description' => 'required',
        ];
    }
}
