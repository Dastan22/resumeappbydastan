<?php

namespace App\Models;

use App\Http\Controllers\EducationController;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

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
        'date_of_birth',
        'email',
        'phoneNumber',
        'password',


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

//    public function setPasswordAttribute($password){
//        $this->attributes['password'] = Hash::make($password);
//    }

    public function roles() {
        return $this->belongsToMany('App\Models\Role');
    }

    public function hasAnyRole( string $role){
        return null !== $this->roles()->where('name', $role)->first();
    }

    public function hasAnyRoles( array $role){
        return null !== $this->roles()->whereIn('name', $role)->first();
    }

    public function education() {
        return $this->hasMany(Education::class);
    }

    public function experience() {
        return $this->hasMany(Experience::class);
    }

    public function skill() {
        return $this->hasMany(Skill::class);
    }

    public function detail() {
        return $this->hasMany(UserDetail::class);
    }
}
