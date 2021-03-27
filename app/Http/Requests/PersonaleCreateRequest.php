<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaleCreateRequest extends FormRequest
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
            'driverid' =>  'required|unique:personales,driverid',
            'firstname' =>  'required|min:2',
            'fathername' =>  'required||min:2',
            'gfathername' =>  'required||min:2',
            'sex' => 'required',
            'dddate' => 'required|min:1|max:30',
            'ddmonth' =>  'required|min:1|max:12',
            'ddyear' => 'required|numeric',
            'hdate' =>  'required|min:1|max:30',
            'hmonth' => 'required|min:1|max:12',
            'hyear' =>  'required|numeric',
            'driver' => 'required',
            'pay_grade_id' => 'required',
            'pay_grade_level_id' => 'required',
            'penssionid' => '',
            'tin_no' => 'integer',
            'department_id' =>  'required',
            'position_id' =>  'required',
            'employment_status' =>  'required',
            'marital_status' =>  'required',
            'zone' =>  '',
            'woreda' =>  '',
            'city' =>  '',
            'sub_city' =>  '',
            'kebele' =>  '',
            'housenumber' =>  '',
            'mobile' =>  '',
            'home_telephone' =>  '',
            'work_telephone' =>  '',
            'email' =>  '',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
