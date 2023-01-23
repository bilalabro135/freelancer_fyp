<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaidReciet extends Model
{
    use HasFactory;
    protected $table    = 'paid_reciets';
    protected $fillable = [
        'student_id',
        'amount',
        'fees_pay'
    ];

    public function getCreatedAtAttribute($value){
        if ($value) {
            $value = date("d M Y",strtotime($value));
            return $value;
        }
    }
}
