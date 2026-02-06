<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
     protected $fillable = ['nombre', 'activo'];
    public $timestamps = false; // Laravel no actualizará created_at ni updated_at
}

