<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Grupo;
use App\Models\Carrera;
use App\Models\Turno;
use App\Models\Grado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::with('grupo')->get();
        return view('alumnos.index', compact('alumnos'));
    }
    public function desactivar($id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->activo = 0; // Suponiendo que tienes un campo 'activo' en la tabla
        $alumno->save();

        return redirect()->route('alumnos.index')->with('success', 'Alumno desactivado correctamente.');
    }
     public function activar($id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->activo = 1; // Suponiendo que tienes un campo 'activo' en la tabla
        $alumno->save();

        return redirect()->route('alumnos.index')->with('success', 'Alumno desactivado correctamente.');
    }


    public function create()
    {
        return view('alumnos.create', [
            'carreras' => Carrera::where('activo', 1)->get(),
            'turnos'   => Turno::where('activo', 1)->get(),
            'grados'   => Grado::where('activo', 1)->get(),
            'grupos'   => Grupo::all(),
        ]);
    }
    public function edit($id)
    {
        $alumno = Alumno::findOrFail($id);
        $carreras = Carrera::where('activo', 1)->get();
        $turnos = Turno::where('activo', 1)->get();
        $grados = Grado::where('activo', 1)->get();
        $grupos = Grupo::all();

        return view('alumnos.edit', compact('alumno', 'carreras', 'turnos', 'grados', 'grupos'));
    }


        public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'carrera_id' => 'required',
            'turno_id' => 'required',
            'grado_id' => 'required',
        ]);

        $grupoClave = null;

        DB::transaction(function () use ($request, &$grupoClave) {

            $grupo = Grupo::where('carrera_id', $request->carrera_id)
                ->where('turno_id', $request->turno_id)
                ->where('grado_id', $request->grado_id)
                ->orderBy('numero_grupo', 'desc')
                ->first();

            $alumnosActivos = $grupo
                ? $grupo->alumnos()->where('activo', 1)->count()
                : 0;

            if (!$grupo || $alumnosActivos >= 20) {

                $numeroGrupo = $grupo ? $grupo->numero_grupo + 1 : 1;

                $grupo = Grupo::create([
                'carrera_id'   => $request->carrera_id,
                'grado_id'     => $request->grado_id,
                'turno_id'     => $request->turno_id,
                'numero_grupo' => $numeroGrupo,
                'clave'        => 'G-' . $request->carrera_id . '-' . $request->grado_id . '-' . $numeroGrupo,
                'cupo_maximo'  => 20,
            ]);

            }

            Alumno::create([
                'nombre' => $request->nombre,
                'apellido_paterno' => $request->apellido_paterno,
                'apellido_materno' => $request->apellido_materno,
                'grupo_id' => $grupo->id,
                'activo' => 1
            ]);

            // 👇 Guardamos la clave del grupo
            $grupoClave = $grupo->clave;
        });

        return redirect()
            ->route('alumnos.index')
            ->with('grupo_asignado', $grupoClave);
    }

  
            

    private function generarClave($carreraId, $gradoId, $numeroGrupo, $turnoId)
    {
        $carrera = Carrera::findOrFail($carreraId);
        $grado   = Grado::findOrFail($gradoId);

        $abreviatura = strtoupper(substr($carrera->nombre, 0, 3));
        $turno = $turnoId == 1 ? 'M' : 'V';

        return $abreviatura
            . $grado->nombre
            . str_pad($numeroGrupo, 2, '0', STR_PAD_LEFT)
            . '-' . $turno;
    }
    
   public function update(Request $request, $id)
    {
        // Validación
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            // agrega otros campos que necesites
        ]);

        // Buscar el alumno
        $alumno = Alumno::findOrFail($id);

        // Actualizar datos
        $alumno->update($request->all());

        return redirect()->route('alumnos.index')
                        ->with('success', 'Alumno actualizado correctamente');
    }


}
