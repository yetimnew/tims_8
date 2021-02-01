<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverCreateRequest extends FormRequest
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
            'driverid'=>'required|unique:drivers,driverid|max:15',
            'name'=>'required|regex:/^[\pL\s\-]+$/u',
            'sex'=>'required',
            'birth_date'=>'nullable|date',
            'zone'=>'nullable|max:50',
            'woreda'=>'nullable|max:50',
            'kebele'=>'nullable|max:50',
            'house_number'=>'nullable|max:50',
            'mobile'=>'required|unique:drivers,mobile|min:10|max:13',
            'hired_date'=>'required|date',
        ];
    }
}
