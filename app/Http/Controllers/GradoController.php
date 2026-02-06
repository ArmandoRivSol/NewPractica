<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use Illuminate\Http\Request;

class GradoController extends Controller
{
    public function index()
    {
        $grados = Grado::all();
        return view('grados.index', compact('grados'));
    }

    public function create()
    {
        return view('grados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
        ]);

        Grado::create([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('grados.index')
            ->with('success', 'Grado registrado correctamente');
    }

    public function edit(Grado $grado)
    {
        return view('grados.edit', compact('grado'));
    }

    public function update(Request $request, Grado $grado)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
        ]);

        $grado->update([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('grados.index')
            ->with('success', 'Grado actualizado correctamente');
    }

    public function destroy($id)
    {
        $grado = Grado::findOrFail($id);
        
        // Desactivar el registro en lugar de borrarlo
        $grado->update(['activo' => 0]);

        return redirect()->route('grados.index')
                        ->with('success', 'Grado desactivado correctamente.');
    }
    public function activar($id)
    {
        $grado = Grado::findOrFail($id);
        // Desactivar el registro en lugar de borrarlo
        $grado->update(['activo' => 1]);

        return redirect()->route('grados.index')
                        ->with('success', 'Grado activado correctamente.');
    }


}
