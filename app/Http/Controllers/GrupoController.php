<?php

namespace App\Http\Controllers;

use App\Models\Grupo;

class GrupoController extends Controller
{
    public function index()
    {
        $grupos = Grupo::withCount('alumnos')->get();
        return view('grupos.index', compact('grupos'));
    }

    public function show($id)
    {
        $grupo = Grupo::with('alumnos')->findOrFail($id);
        return view('grupos.show', compact('grupo'));
    }
}
