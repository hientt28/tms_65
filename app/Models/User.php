<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const ROLE_ADMIN = 1;
    const ROLE_USER = 0;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'sex',
        'birthday',
        'phone',
        'avatar',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function socialNetworks()
    {
        return $this->hasMany(SocialNetwork::class);
    }

    public function userSubjects()
    {
        return $this->hasManyThrough(UserSubject::class, UserCourse::class);
    }
    
    public function userTasks()
    {
        return $this->hasManyThrough(UserTask::class, UserCourse::class);

    public function isAdmin()
    {
        return $this->role;
    }
}
