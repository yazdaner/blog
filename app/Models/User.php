<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile',
        'user_name',
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


    public function getUserRole($type = null)
    {
        switch ($type) {
            case 'display_name':
                return $this->roles->first()->display_name;

                break;

            default:
            return $this->roles->first()->name;

                break;
        }
        return $this->roles->first()->name;
    }

    public function getUserProfile()
    {
        if(isset($this->profile)){
            return asset(env('USER_IMAGES_PATH').$this->profile);
        }else{
            return asset(env('USER_IMAGES_PATH').'user.png');
        }
    }

    public function likes()
    {
        return $this->belongsToMany(Post::class,'likes');
    }

    public function bookmarks()
    {
        return $this->belongsToMany(Post::class,'bookmarks');
    }
}
