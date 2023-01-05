<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

      if((isset($this->action)) && (($this->action) == "store") ){
        return [
                'name'              => 'required|min:3|unique:students,name',
                'gender'            => 'required|numeric',
                'dob'               => 'required|date',
                'admission_class'   => 'required|numeric|digits_between:1,12',
                'acdm_smstr'        => 'required|max:20',
                'last_attend'       => 'required|max:100',
                'date_leave'        => 'required|date',
                'last_pass'         => 'required|numeric|digits_between:1,12',
                'transport'         => 'required|max:3',
                'f_name'            => 'required|min:3',
                'caste'             => 'required|min:3|max:10',
                'occupation'        => 'required|min:3|max:10',
                'phone'             => 'required|min:11|max:14',
                'address'           => 'required',
                'cnic'              => 'required|digits:13',
                'phone_res'         => 'required|min:11|max:14',
                'name_guardian'     => 'required|min:3',
                'guardian_caste'    => 'required|min:3|max:10',
                'rel_student'       => 'required|min:3|max:10',
                'guardian_phone'    => 'required|min:11|max:13',
                'guardian_cnic'     => 'required|digits:13|numeric',
                'guardian_address'  => 'required',
                'assesment_date'    => 'required|date',
                'dob_student'       => 'required|date',
                'age'               => 'required|max:2',
                'student_fee'       => 'required|max:5',
                'age_required'      => 'required',
                'student_pic'       => 'required',
                'case_ref_class'    => 'required|numeric|digits_between:1,12',
                'forward_to'        => 'required|digits_between:1,12|numeric'
            ];
      }else{
        return [
            'name'              => ['min:3','required'],
            'gender'            => 'required|numeric',
            'dob'               => 'required|date',
            'admission_class'   => 'required|numeric|digits_between:1,12',
            'acdm_smstr'        => 'required|max:20',
            'last_attend'       => 'required|max:100',
            'date_leave'        => 'required|date',
            'last_pass'         => 'required|numeric|digits_between:1,12',
            'transport'         => 'required|max:3',
            'f_name'            => 'required|min:3',
            'caste'             => 'required|min:3|max:10',
            'occupation'        => 'required|min:3|max:10',
            'phone'             => 'required|min:11|max:14',
            'address'           => 'required',
            'cnic'              => 'required|digits:13',
            'phone_res'         => 'required|min:11|max:14',
            'name_guardian'     => 'required|min:3',
            'guardian_caste'    => 'required|min:3|max:10',
            'rel_student'       => 'required|min:3|max:10',
            'guardian_phone'    => 'required|min:11|max:13',
            'guardian_cnic'     => 'required|digits:13|numeric',
            'guardian_address'  => 'required',
            'assesment_date'    => 'required|date',
            'dob_student'       => 'required|date',
            'age'               => 'required|max:2',
            'student_fee'       => 'required|max:5',
            'age_required'      => 'required',
            'case_ref_class'    => 'required|numeric|digits_between:1,12',
            'forward_to'        => 'required|digits_between:1,12|numeric'
        ];
      }
        
       
    }

    public function messages()
    {
        return [
            'name.required'         => 'Student name is required',
            'name.min'              => 'Student name must be three or more character long',
        ];
    }
}
