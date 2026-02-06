<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    public $timestamps = false; // <- Esto desactiva created_at y updated_at

    protected $fillable = [
        'carrera_id',
        'grado_id',
        'turno_id',
        'numero_grupo',
        'clave',
        'cupo_maximo',
    ];
}
