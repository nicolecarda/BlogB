<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    //relación de 1:1 polimórfica con User

    public function imageable(){
        return $this->morphTo();
    }
}
