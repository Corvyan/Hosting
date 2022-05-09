<?php

namespace App\Models;

use App\Models\Competition;
use App\Models\User;
use App\Models\Appeal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appeal extends Model
{
    use HasFactory;

    // dont forget SoftDeletes

    protected $fillable = [
        'user_id', 
        'appeal_status', 
        'user_name', 
        'participant1_name', 
        'participant2_name', 
        'participant3_name', 
        'participant4_name',
        'participant5_name', 
        'participant1_university',
        'participant2_university',
        'participant3_university',
        'participant4_university',
        'participant5_university',
        'supervisor_name',  
    ];

    public function competition()
    {
        return $this->belongsTo(Competition::class, 'user_name', 'appeal_status', 'user_id');
    }
}
