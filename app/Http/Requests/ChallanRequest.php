<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ChallanRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

      if((isset($this->action)) && (($this->action) == "store") ){
        return [
            'student_id'    => 'required',
            'monthly_fee'   => 'required|numeric|max:5000',
        ];
      }else{
        return [
            'student_id'    => 'required',
            'monthly_fee'   => 'required|numeric|max:5000',
        ];
      }
        
       
    }

    public function messages()
    {
        return [
            'student_id.required' => 'You must select the student for challan',
            'monthly_fee.required' => 'Monthly fee is mandatory',
        ];
    }
}
