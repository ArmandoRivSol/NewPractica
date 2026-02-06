@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h5 class="mb-0">Editar Alumno</h5>
        </div>

        <div class="card-body">

            {{-- ERRORES --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('alumnos.update', $alumno->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- DATOS PERSONALES --}}
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Nombre</label>
                        <input
                            type="text"
                            name="nombre"
                            class="form-control"
                            value="{{ old('nombre', $alumno->nombre) }}"
                            required
                        >
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Apellido Paterno</label>
                        <input
                            type="text"
                            name="apellido_paterno"
                            class="form-control"
                            value="{{ old('apellido_paterno', $alumno->apellido_paterno) }}"
                            required
                        >
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Apellido Materno</label>
                        <input
                            type="text"
                            name="apellido_materno"
                            class="form-control"
                            value="{{ old('apellido_materno', $alumno->apellido_materno) }}"
                            required
                        >
                    </div>
                </div>

                {{-- GRUPO --}}
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Grupo</label>
                        <select name="grupo_id" class="form-select" required>
                            <option value="">Seleccione un grupo</option>
                            @foreach ($grupos as $grupo)
                                <option value="{{ $grupo->id }}"
                                    {{ $alumno->grupo_id == $grupo->id ? 'selected' : '' }}>
                                    {{ $grupo->clave }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- BOTONES --}}
                <div class="d-flex justify-content-end">
                    <a href="{{ route('alumnos.index') }}" class="btn btn-secondary me-2">
                        Cancelar
                    </a>
                    <button type="submit" class="btn btn-warning">
                        Actualizar Alumno
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
