@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Alumnos Registrados</h4>
        <a href="{{ route('alumnos.create') }}" class="btn btn-primary">
            + Nuevo Alumno
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">

            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Grupo</th>
                        <th>Estado</th>
                        <th width="220">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($alumnos as $alumno)
                        <tr class="{{ $alumno->activo ? 'table-success' : 'table-danger' }}">
                            <td class="text-center">{{ $alumno->id }}</td>

                            <td>
                                {{ $alumno->nombre }}
                                {{ $alumno->apellido_paterno }}
                                {{ $alumno->apellido_materno }}
                            </td>

                            <td class="text-center">
                                {{ $alumno->grupo->clave ?? 'Sin grupo' }}
                            </td>

                            <td class="text-center">
                                @if ($alumno->activo)
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-danger">Inactivo</span>
                                @endif
                            </td>

                            <td class="text-center">
                                {{-- EDITAR --}}
                                <a href="{{ route('alumnos.edit', $alumno->id) }}"
                                   class="btn btn-sm btn-warning">
                                    Editar
                                </a>

                                {{-- ACTIVAR / DESACTIVAR --}}
                                @if ($alumno->activo)
                                    <form action="{{ route('alumnos.desactivar', $alumno->id) }}"
                                          method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-sm btn-danger">
                                            Inactivar
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('alumnos.activar', $alumno->id) }}"
                                          method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-sm btn-success">
                                            Activar
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                No hay alumnos registrados
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection
