<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Challan extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
            'student_id',
            'admission_fee',
            'annual_fee',
            'transport_fee',
            'others',
            'monthly_fee'
    ];

    public function getCreatedAtAttribute($value){
        if ($value) {
            $value = date("d M Y",strtotime($value));
            return $value;
        }
    }

}
