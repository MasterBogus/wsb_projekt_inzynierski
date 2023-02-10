<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klucze extends Model
{
    protected $table = 'Klucze';
    public $timestamps = false;
    protected $primaryKey = "id_klucza";

    public function Lokale()
    {
        return $this->hasOne('App\Models\Lokale');
    }
}
