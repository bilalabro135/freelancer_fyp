<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Applicants;

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
        'role_id',
        'job_category',
        'job_image',
        'project_file',
        'user_id',
        'active',
    ];

    public function applicants()
    {
        return $this->hasMany(Applicants::class);
    }

    public function GetDeliveryTimeAttribute($value){
        switch ($value) {
            case '1':
                return "1 Day";
            break;

            case '2':
                return "2 Days";
            break;

            case '3':
                return "3 Days";
            break;

            case '4':
                return "4 Days";
            break;

            case '5':
                return "5 Days";
            break;

            case '6':
                return "6 Days";
            break;

            case '7':
                return "7 Days";
            break;

            case '1x':
                return "About 1 month";
            break;

            case '3x':
                return "About 3 months";
            break;

            case '6x':
                return "About 6 months";
            break;
            
            default:
                "About 1 month";
                break;
        }
    }
}
