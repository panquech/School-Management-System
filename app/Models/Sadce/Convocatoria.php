<?php

namespace App\Models\Sadce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convocatoria extends Model
{
    use HasFactory;

    protected $connection = 'sadce';
    // Como este modelo sí sigue la convención, no es necesario especificar el nombre de la tabla.
}
