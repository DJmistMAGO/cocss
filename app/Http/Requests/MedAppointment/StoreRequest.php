<?php

namespace App\Http\Requests\MedAppointment;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [

            'book_appointment_id' => ['required'],
            'result' => ['required'],

            'medicine_name' => ['required' , 'array'],
            'medicine_name.*' => ['required'],
            'med_quantity' => ['required' , 'array'],
            'med_quantity.*' => ['required'],
            'med_time' => ['required' , 'array'],
            'med_time.*' => ['required'],
        ];
    }
}
