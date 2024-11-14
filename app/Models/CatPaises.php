<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Alumno\Alumnos;

class CatPaises extends Model
{
    use HasFactory;

    public function alumno(){
        return $this->hasOne(Alumnos::class);
    }
}
