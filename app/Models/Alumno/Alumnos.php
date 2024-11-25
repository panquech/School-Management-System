<?php

namespace App\Models\Alumno;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Alumno\AlumnosDomicilios;
use App\Models\CatPaises;
use App\Models\CatNacionalidades;

class Alumnos extends Model
{
    use HasFactory;

    // Especificamos el nombre de las tablas ya que no se están siguiendo las convenciones de nombrar archivos.
    protected $table = 'alumnos';

    protected $fillable = ['nombre_artistico', 'fecha_nacimiento', 'curp', 'rfc', 'sexo_id', 'otro_sexo', 'pais_id', 'estado_id', 'nacionalidad_id', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    // como en este proyecto no se están siguiendo al 100 las convenciones de laravel / Eloquent, debemos especificar el nombre que le ponemos a las llaves
    public function domicilio(){
        return $this->hasOne(AlumnosDomicilios::class, 'alumno_id');
    }

    public function pais(){
        return $this->belongsTo(CatPaises::class, 'pais_id');
    }

    public function nacionalidad(){
        return $this->belongsTo(CatNacionalidades::class, 'nacionalidad_id');
    }
}
