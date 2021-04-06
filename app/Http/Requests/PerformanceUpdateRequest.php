<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerformanceUpdateRequest extends FormRequest
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
            'trip' => 'required',
            'load_type' => 'required',
            'fo_number' => "required|unique:performances,fo_number, {$this->performance->id}",
            'operation_id' => 'required|numeric',
            'driver_truck_id' => 'required|numeric',
            'date_dispatch' => 'required|date',
            'origin_id' => 'nullable|numeric',
            'destination_id' => 'different:origin_id',
            'distance_without_cargo' => 'nullable|numeric',
            'distance_with_cargo' => 'nullable|numeric',
            'tone' => 'required|numeric',
            'ton_km' => 'required|numeric',
            'fuelIn_litter' => 'nullable|numeric',
            'fuelIn_birr' => 'nullable|numeric',
            'perdiem' => 'nullable|numeric',
            'operational_expense' => 'nullable|numeric',
            'other_expense' => 'nullable|numeric',
            'comment' => 'nullable',
            'is_returned'=>'nullable|numeric',
            // 'returned_date'=>'nullable|required_if:is_returned,1|date',
            'created_by' =>'required',
            'updated_by' =>'required',
        ];
    }
    public function withValidator($v)
    {
       $v->sometimes('returned_date', 'required', function($input){
           return "1"== $input->is_returned;
       });

    }
}
