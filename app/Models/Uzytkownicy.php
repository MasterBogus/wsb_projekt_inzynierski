<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uzytkownicy extends Model
{
    protected $table = 'users';
    protected $primaryKey = "id";
    public $timestamps = false;
}
