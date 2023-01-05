<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalFee extends Model
{
    use HasFactory;
    protected $table    = 'total';
    protected $fillable = [
        'student_id',
        'total'
    ];
}
