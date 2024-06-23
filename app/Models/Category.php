<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    //relación de 1:N con Post

    public function posts(){
        return $this->hasMany(Post::class);
    }

 
}
