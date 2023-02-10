<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grzejniki extends Model
{
    protected $table = 'Grzejniki';
    public $timestamps = false;
    protected $primaryKey = "id_lokalu";

    public function Lokale()
    {
        return $this->hasOne('App\Models\Lokale');
    }
}


