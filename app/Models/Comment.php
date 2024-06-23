<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    //relación de 1:N con User

    public function users(){
        return $this->belongsTo(User::class);
    }

    //relación de 1:N polimórfica con Post y Video

    public function commentable(){
        return $this->morphTo();
    }

   

}
