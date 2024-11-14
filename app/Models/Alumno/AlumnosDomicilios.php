<?php

namespace App\Models\Alumno;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Alumno\Alumnos;

class AlumnosDomicilios extends Model
{
    use HasFactory;

    public function alumno(){
        return $this->belongsTo(Alumnos::class);
    }
}
