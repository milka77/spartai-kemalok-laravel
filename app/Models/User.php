<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'nickname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relationship with News Model
    public function news()
    {
        return $this->hasMany(News::class);
    }

    // Relationship with Role Model
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    // Checking User roles
    public function userHasRole($role_name)
    {
        foreach($this->roles as $role) {
            if(Str::lower($role_name) == Str::lower($role->name)) {
                return true;
            }
            return false;
        }
    }

    // Relationship with RaidTax Model
    public function raidTax()
    {
        return $this->hasMany(RaidTax::class);
    }

    // Relationship with Craft Model
    public function crafts()
    {
        return $this->hasMany(Craft::class);
    }
}
