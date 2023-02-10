<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokale extends Model
{
    protected $table = 'Lokale';
    protected $primaryKey = "id_lokalu";
    public $timestamps = false;

    public function Grzejniki()
    {
        return $this->hasOne(Grzejniki::class,'id_lokalu','id_lokalu');
    }

    public function Instalacje()
    {
        return $this->hasOne(Instalacje::class,'id_lokalu','id_lokalu');
    }

    public function Liczniki()
    {
        return $this->hasOne(Liczniki::class,'id_lokalu','id_lokalu');
    }

    public function Klucze()
    {
        return $this->hasMany(Klucze::class,'id_lokalu','id_klucza');
    }
    
}
