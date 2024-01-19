<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email:rfc|max:255',
            'website' => 'nullable|url|max:255',
            'logo' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,',
                'max:2048',
                'dimensions:min_width=100,min_height=100',
            ],
        ];
    }
}
