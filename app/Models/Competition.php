<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\Appeal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Competition extends Model
{
    use HasFactory;

    protected $table = 'competitions';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name', 'date', 'category', 'description', 'user_id', 'poster'
    ];

    public function appealedBy(User $user)
    {
        return $this->appeals->contains('user_id', $user->id);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function appeals()
    {
        return $this->hasMany(Appeal::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    

}
