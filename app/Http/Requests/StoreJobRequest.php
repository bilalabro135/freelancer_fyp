<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
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
        if((isset($this->action)) && (($this->action) == "store") ){
            return [
                'job_title'     => 'required|string|max:255',
                'location'      => 'required|string|max:255',
                'delivery_time' => 'required',
                'payment_method'=> 'required|string|max:255',
                'price'         => 'required|numeric',
                'role_id'       => 'required|integer|exists:roles,id',
                'job_category'  => 'required|string|max:255',
                'job_image'     => 'required|image|max:2048',
                'project_file'  => 'required|file|mimes:pdf,docx,jpeg,png|max:2048',
                'description'   => 'required|string',
            ];
        }else{
            return [
                'job_title'     => 'required|string|max:255',
                'location'      => 'required|string|max:255',
                'delivery_time' => 'required',
                'payment_method'=> 'required|string|max:255',
                'price'         => 'required|numeric',
                'job_category'  => 'required|string|max:255',
                'description'   => 'required|string',
            ];
        }
    }
}
