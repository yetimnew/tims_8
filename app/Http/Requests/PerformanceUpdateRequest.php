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
            'operation_id' => 'required',
            'driver_truck_id' => 'required',
            'date_dispatch' => 'required|date',
            'origin_id' => 'nullable',
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
            'is_returned'=>'nullable',
            'returned_date'=>'nullable|date'
        ];
    }
}
