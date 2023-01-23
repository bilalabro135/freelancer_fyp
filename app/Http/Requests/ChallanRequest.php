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
        ];
      }else{
        return [
            'student_id'    => 'required',
        ];
      }
        
       
    }

    public function messages()
    {
        return [
            'student_id.required' => 'You must select the student for challan',
        ];
    }
}
