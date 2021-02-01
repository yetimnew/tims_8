<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TruckUpdateRequest extends FormRequest
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
            'plate' => "required|unique:trucks,plate,{$this->truck->id}",
            'truck_models_id' => 'required',
            'chassis_number' =>  "nullable|unique:trucks,chassis_number, {$this->truck->id}",
            'engine_number' =>  "nullable|unique:trucks,engine_number, {$this->truck->id}",
            'tyre_size' =>  'nullable|integer',
            'service_Interval_km' =>  'nullable|integer',
            'purchase_price' => 'nullable|integer',
            'production_date' =>  'nullable|date',
            'service_start_date' =>  'nullable|date'
        ];
    }
}
