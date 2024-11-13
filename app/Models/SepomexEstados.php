<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SepomexEstados extends Model
{
    protected $table = 'sepomex_estados';
    protected $primaryKey = 'c_estado';

    public function municipios()
    {
        
        return $this->hasMany(SepomexMunicipios::class, 'c_estado');
    }
}
