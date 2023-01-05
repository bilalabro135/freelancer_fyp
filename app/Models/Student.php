<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'gender',
        'dob',
        'admission_class',
        'acdm_smstr',
        'last_attend',
        'date_leave',
        'last_pass',
        'transport',
        'f_name',
        'caste',
        'occupation',
        'phone',
        'address',
        'cnic',
        'phone_res',
        'name_guardian',
        'guardian_caste',
        'rel_student',
        'guardian_phone',
        'guardian_cnic',
        'guardian_address',
        'assesment_date',
        'dob_student',
        'age',
        'student_fee',
        'student_pic',
        'age_required',
        'admission_date',
        'case_ref_class',
        'forward_to',
        'dated',
        'active'
    ];

    public function getActiveAttribute($value)
    {
        return ($value == 1) ? "Active" : "Inactive";
    }

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }
}