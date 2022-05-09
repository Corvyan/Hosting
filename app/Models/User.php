<?php

namespace App\Models;

use App\Models\Competition;
//use App\Models\Request;
use App\Models\Appeal;
use App\Models\Major;
use App\Models\Faculty;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'id_number',
        'gender',
        'year_start',
        'university',
        'faculty',
        'major',
        
        // name email password role_id id_number gender year_start university faculty major
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role() {
        return $this->belongsTo('App\Models\Role');
    }

    public function competitions(){
        return $this->hasMany(Competition::class);
    }

    public function appeals()
    {
        return $this->hasMany(Appeal::class);
    }

    public function faculty()
    {
        return $this->hasOne(Faculty::class);
    }

    public function major()
    {
        return $this->hasOne(Major::class);
    }

    public function isAdmin(){ // admin
        if ($this->role->name == 'Admin'){
            return true;
        }
        return false;
    }

    public function isUser(){ // user
        if ($this->role->name == 'User'){
            return true;
        }
        return false;
    }

}
