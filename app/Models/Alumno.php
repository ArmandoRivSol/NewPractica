<?php

// app/Models/Alumno.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
    ];


    use HasFactory;

    // Definir la relación con Grupo
    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }
    

    // Puedes agregar más relaciones o métodos según necesites
}
