<?php

namespace App\Models;

use App\Models\Faculty;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $fillable = [
        'major_name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'major_name');
    }
}
