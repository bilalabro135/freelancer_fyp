<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;
    protected $dates    = ['deleted_at'];

    protected $fillable = [
        'name',
        'tagline',
        'email',
        'password',
        'contact_no',
        'description',
        'experience',
        'education',
        'profile_pic',
        'active',
        'created_by',
        'updated_by'
    ];

   
    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getActiveAttribute($value)
    {
        return ($value == 1) ? "Active" : "Inactive";
    }

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    public function applicant()
    {
        return $this->hasOne(Applicant::class, 'user_id');
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class, 'user_id');
    }

    public function hiredProjects()
    {
        return $this->belongsToMany(Project::class, 'applicants', 'user_id', 'project_id')->where('active', 2);
    }
}
