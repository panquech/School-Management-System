<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    // Especificamos que se usará esta conexión a la base de datos, declarada en config/database.php
    protected $connection = 'sadce';

    protected $table = 'solicitudes_aspirantes';
}
