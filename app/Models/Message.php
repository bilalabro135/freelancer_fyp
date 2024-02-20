<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['from_user_id', 'to_user_id', 'message', 'project_name', 'file_path'];

    public function sender()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function getCreatedAtHumanReadableAttribute()
    {
        return $this->created_at->diffForHumans();
    }

}
