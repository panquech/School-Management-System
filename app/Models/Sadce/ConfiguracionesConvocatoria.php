<?php

namespace App\Models\Sadce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfiguracionesConvocatoria extends Model
{
    use HasFactory;

    protected $connection = 'sadce';

    public function convocatoria(){
        return $this->belongsTo('App\Models\Sadce\Convocatoria');
    }

    public function solicitudes(){
        return $this->hasMany('App\Models\Sadce\SolicitudesAspirante');
    }
}
