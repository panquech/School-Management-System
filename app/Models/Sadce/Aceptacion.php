<?php

namespace App\Models\Sadce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aceptacion extends Model
{
    use HasFactory;
    
    // Especificamos que se usará esta conexión a la base de datos, declarada en config/database.php
    protected $connection = 'sadce';

    protected $table = 'aspirantes_aceptaciones';

    public function solicitud(){
        return $this->belongsTo('App\Models\Sadce\SolicitudesAspirante');
    }
}
