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
        'for_month',
        'amount',
        'fees_pay'
    ];
}
