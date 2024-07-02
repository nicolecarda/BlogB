<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [ ];

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    //relación de 1:N con Post

    public function posts(){
        return $this->hasMany(Post::class);
    }


    //relación de N:N con Role

    public function roles(){
        return $this->belongsToMany(role::class);
    }


    //relación de 1:N con Video

    public function videos(){
        return $this->hasMany(Video::class);
    }

    //relación de 1:1 con Profile

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    //relación de 1:N con Comment

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    //relación de 1:1 polimórfica con Image

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
