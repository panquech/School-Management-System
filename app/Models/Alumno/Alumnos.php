<?php

namespace App\Models\Alumno;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Alumnos extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
