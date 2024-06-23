<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;


    //relación de 1:N con User

    public function user(){
        return $this->belongsTo(User::class);
    }

    //relación de 1:N con Comment
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

     //relación de N:N polimórfica con Tag

     public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
