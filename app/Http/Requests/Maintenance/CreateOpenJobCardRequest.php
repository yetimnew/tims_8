<?php

namespace App\Http\Requests\Maintenance;

use Illuminate\Foundation\Http\FormRequest;

class CreateOpenJobCardRequest extends FormRequest
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
            'job_card_type'=>'required',
            'Job_card_number'=>'required|unique:open_job_cards,Job_card_number|max:15|min:2',
            'opening_date'=>'required|date',
            'workshop_id'=>'required',
            'customer'=>'required',
            'trucks'=>'required',
            'km_reading'=>'numeric',
            'km_reading_date'=>'date',
            'driver'=>'',
            'mechnic'=>'',
            'assistant_mechnic'=>'',
            'receptionist'=>'',
            'jobsystem'=>'required',
            'job_ident'=>'required',
            'comment'=>'',
        ];
    }
}
