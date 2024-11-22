<?php

namespace App\Models\Sadce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudesAspirante extends Model
{
    use HasFactory;

    protected $connection = 'sadce';

    public function aspirante(){
        return $this->belongsTo('App\Models\Sadce\Aspirante');
    }
    
    public function configuracion(){
        return $this->belongsTo('App\Models\Sadce\ConfiguracionesConvocatoria');
    }

    public function aceptacion(){
        return $this->hasOne('App\Models\Sadce\Aceptacion');
    }


}
