<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instalacje extends Model
{
    protected $table = 'Instalacje';
    public $timestamps = false;
    protected $primaryKey = "id_lokalu";

    public function Lokale()
    {
        return $this->hasOne('App\Models\Lokale');
    }
}
