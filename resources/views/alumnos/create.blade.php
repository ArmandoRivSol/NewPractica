@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Registro de Alumno</h5>
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

            <form action="{{ route('alumnos.store') }}" method="POST">
                @csrf

                {{-- DATOS PERSONALES --}}
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Apellido Paterno</label>
                        <input type="text" name="apellido_paterno" class="form-control" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Apellido Materno</label>
                        <input type="text" name="apellido_materno" class="form-control" required>
                    </div>
                </div>

                {{-- DATOS ESCOLARES --}}
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label class="form-label">Carrera</label>
                        <select name="carrera_id" class="form-select" required>
                            <option value="">Seleccione una carrera</option>
                            @foreach ($carreras as $carrera)
                                <option value="{{ $carrera->id }}">
                                    {{ $carrera->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Turno</label>
                        <select name="turno_id" class="form-select" required>
                            <option value="">Seleccione un turno</option>
                            @foreach ($turnos as $turno)
                                <option value="{{ $turno->id }}">
                                    {{ $turno->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Grado (Cuatrimestre)</label>
                        <select name="grado_id" class="form-select" required>
                            <option value="">Seleccione un grado</option>
                            @foreach ($grados as $grado)
                                <option value="{{ $grado->id }}">
                                    {{ $grado->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Grupo</label>
                        <select name="grupo_id" class="form-select" required>
                            <option value="">Seleccione un grupo</option>
                            @foreach ($grupos as $grupo)
                                <option value="{{ $grupo->id }}">
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
                    <button type="submit" class="btn btn-success">
                        Registrar Alumno
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
