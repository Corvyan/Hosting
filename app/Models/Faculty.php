<?php

namespace App\Models;

use App\Models\User;
use App\Models\Major;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'faculty_name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'faculty_name');
    }
}
