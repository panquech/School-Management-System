<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SepomexMunicipios extends Model
{
    protected $table = 'sepomex_municipios';
    protected $primaryKey = 'c_mnpio';

    public function estado()
    {
        return $this->belongsTo(SepomexEstado::class, 'c_estado', 'c_estado');
    }
}
