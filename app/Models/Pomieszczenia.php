<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pomieszczenia extends Model
{
    protected $table = 'Pomieszczenia';
    protected $primaryKey = "id_pomieszczenia";
    public $timestamps = false;
}
