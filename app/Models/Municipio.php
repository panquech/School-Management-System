<?php

namespace App\Models;

use App\User;
use Eloquent;

class Municipio extends Eloquent
{
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
