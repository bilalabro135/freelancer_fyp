<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_title',
        'delivery_time',
        'location',
        'description',
        'payment_method',
        'price',
        'job_category',
        'job_image',
        'user_id',
        'active',
    ];
}
