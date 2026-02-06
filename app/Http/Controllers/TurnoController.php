<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    /**
     * Mostrar lista de turnos
     */
    public function index()
    {
        $turnos = Turno::all();
        return view('turnos.index', compact('turnos'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        return view('turnos.create');
    }

    /**
     * Guardar nuevo turno
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50'
        ]);

        Turno::create([
            'nombre' => $request->nombre,
            'activo' => 1
        ]);

        return redirect()->route('turnos.index')
            ->with('success', 'Turno registrado correctamente');
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(Turno $turno)
    {
        return view('turnos.edit', compact('turno'));
    }

    /**
     * Actualizar turno
     */
    public function update(Request $request, Turno $turno)
    {
        $request->validate([
            'nombre' => 'required|string|max:50'
        ]);

        $turno->update([
            'nombre' => $request->nombre
        ]);

        return redirect()->route('turnos.index')
            ->with('success', 'Turno actualizado correctamente');
    }

    /**
     * Activar / desactivar turno
     */
    public function destroy(Turno $turno)
    {
        $turno->update([
            'activo' => !$turno->activo
        ]);

        return redirect()->route('turnos.index')
            ->with('success', 'Estado del turno actualizado');
    }
}
