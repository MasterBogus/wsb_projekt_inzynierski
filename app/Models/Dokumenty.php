<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumenty extends Model
{
    protected $table = 'Dokumenty';
    protected $primaryKey = "id_dokumentu";
    public $timestamps = false;

    public function Najemcy()
    {
        return $this->hasOne(Najemcy::class,'id_najemcy','id_najemcy');
    }

    public function Lokale()
    {
        return $this->hasOne(Lokale::class,'id_lokalu','id_lokalu');
    }
}
