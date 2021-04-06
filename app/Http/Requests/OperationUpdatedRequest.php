<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OperationUpdatedRequest extends FormRequest
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
            'operationid' => "required|unique:operations,operationid,{$this->operation->id}",
            'customer_id' => 'required',
            'start_date' => 'required',
            'place_id' => 'required',
            'volume' => 'required|integer',
            'cargo_type' => 'required',
            'tone' => 'required|regex:/^\d{1,13}(\.\d{1,4})?$/',
            'tariff' => 'required|regex:/^\d{1,13}(\.\d{1,4})?$/',
            'created_by'=>'required',
            'updated_by' =>'required',
        ];
    }
}
