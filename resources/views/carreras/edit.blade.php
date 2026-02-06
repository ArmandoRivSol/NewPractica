@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Editar Carrera</h4>
        <a href="{{ route('carreras.index') }}" class="btn btn-secondary">
            ← Volver
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body">

            <form action="{{ route('carreras.update', $carrera) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nombre de la carrera</label>
                    <input
                        type="text"
                        name="nombre"
                        class="form-control"
                        value="{{ old('nombre', $carrera->nombre) }}"
                        required
                    >
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        Actualizar
                    </button>
                </div>
            </form>

        </div>
    </div>

</div>
@endsection
