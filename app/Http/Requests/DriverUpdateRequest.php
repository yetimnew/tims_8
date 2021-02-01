<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverUpdateRequest extends FormRequest
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
            'driverid'=>"required|max:15|unique:drivers,driverid,{$this->driver->id}",
            'name'=>'required|regex:/^[\pL\s\-]+$/u',
            'sex'=>'required',
            'birth_date'=>'nullable|date',
            'zone'=>'nullable|max:50',
            'woreda'=>'nullable|max:50',
            'kebele'=>'nullable|max:50',
            'house_number'=>'nullable|max:50',
            'mobile'=>"required|min:10|max:13|unique:drivers,mobile,{$this->driver->id}",
            'hired_date'=>'required|date',
        ];
    }
}
