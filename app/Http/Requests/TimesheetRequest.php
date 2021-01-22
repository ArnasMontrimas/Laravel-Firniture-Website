<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimesheetRequest extends FormRequest
{

    protected $redirect = '/selection';

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
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        //Custom error message for when total weekly hours is greater than 48h
        return [
            'monday.max' => 'Total Weekly Hours can not be greater than 48hours',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        //This is a DIY sort of way to make sure that total weekly hours worked is not above 48h
        $total = request()->monday + request()->tuesday + request()->wednesday + request()->thursday + request()->friday + request()->saturday;

        if($total > 48) {
            return [
                'monday' => 'max:-1',
            ];
        }

        return [
            'monday' => 'required|numeric|between:0,12',
            'tuesday' => 'required|numeric|between:0,12',
            'wednesday' => 'required|numeric|between:0,12',
            'thursday' => 'required|numeric|between:0,12',
            'friday' => 'required|numeric|between:0,12',
            'saturday' => 'required|numeric|between:0,12',
        ];
    }
}
