<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;


    //relación de 1:N con Post

    public function posts(){
        return $this->hasMany(Post::class);
    }

    //relación de 1:1 con User

    public function users(){
        return $this->belongsTo(User::class);
    }
}
