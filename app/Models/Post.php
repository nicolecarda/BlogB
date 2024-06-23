<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // relación de 1:N con User

    public function user(){
        return $this->belongsTo(User::class);
    }

    //relación de 1:N con Category

    public function category(){
        return $this->belongsTo(Category::class);
    }

    //relación de 1:N con Profile

    public function profile(){
        return $this->belongsTo(Profile::class);
    }

    //relación de 1:N con Comment

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    //relación de 1:1 polimórfica con Image

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    //relación de N:N polimórfica con Tag

    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }

}
