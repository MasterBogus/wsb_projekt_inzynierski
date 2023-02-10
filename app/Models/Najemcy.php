<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Najemcy extends Model
{
    protected $table = 'Najemcy';
    protected $primaryKey = "id_najemcy";
    public $timestamps = false;
}
