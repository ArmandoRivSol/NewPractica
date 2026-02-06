<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Grado extends Model
{
    protected $table = 'grados';
    public $timestamps = false; // si no tienes created_at y updated_at

    protected $fillable = ['nombre', 'activo'];
    
}
