<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $employeeId = $this->route('employee') ? $this->route('employee')->id : null;

        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => [
                'nullable',
                'string',
                'email',
                'max:255',
                Rule::unique('employees')->where(function ($query) {
                    return $query->where('company_id', $this->company_id);
                })->ignore($employeeId),
            ],
            'phone' => [
                'nullable',
                'string',
                'regex:/^([0-9\s\-\+\(\)]*)$/',
                'min:10',
                'max:15',
                Rule::unique('employees')->where(function ($query) {
                    return $query->where('company_id', $this->company_id);
                })->ignore($employeeId),
            ],
            'company_id' => 'required|exists:companies,id',
        ];
    }
}
