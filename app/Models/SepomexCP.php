<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SepomexCP extends Model
{
    protected $table = 'sepomex_cp';
    
    public static function busca_cp($cp)
    {
        
        $cp = SepomexCP::where('d_codigo', $cp)->first();
        return $cp;
    }
}
