<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    //relación de N:N polimórfica con Post y Video

    public function posts(){
        return $this->morphedByMany(Post::class, 'taggable');
    }

    //relación N:N polimórfica con Video

    public function videos(){
        return $this->morphedByMany(Video::class, 'taggable');
    }
}
