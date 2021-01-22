<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'employeeSalary' => 'required|numeric|between:0.01,9999999.99',
            'employeeName' => 'required|max:20',
            'employeeSurname' => 'required|max:20',
            'employeeEmail' => 'required|unique:App\Employee,email',
            'employeePassword' => 'required',
            'employeeCity' => 'required|max:20',
            'employeeStreet' => 'required|max:30',
            'employeePostcode' => 'required|max:15',
            'types' => 'required',
        ];
    }
}
