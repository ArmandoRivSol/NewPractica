<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    public function index()
    {
        $carreras = Carrera::orderBy('id')->get();
        return view('carreras.index', compact('carreras'));
    }

    public function create()
    {
        return view('carreras.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
        ]);

        Carrera::create([
            'nombre' => $request->nombre,
            'activo' => 1,
        ]);

        return redirect()->route('carreras.index')
            ->with('success', 'Carrera creada correctamente');
    }

    public function edit(Carrera $carrera)
    {
        return view('carreras.edit', compact('carrera'));
    }

    public function destroy(Carrera $carrera)
    {
        $carrera->activo = !$carrera->activo;
        $carrera->save();

        return redirect()->route('carreras.index')
            ->with('success', 'Estado actualizado');
    }
}
