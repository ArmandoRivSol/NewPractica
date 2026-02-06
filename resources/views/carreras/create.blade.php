@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Nueva Carrera</h5>
            <a href="{{ route('carreras.index') }}" class="btn btn-sm btn-secondary">
                Volver
            </a>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('carreras.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nombre de la carrera</label>
                    <input type="text"
                           name="nombre"
                           class="form-control"
                           placeholder="Ej. Ingeniería en Sistemas"
                           value="{{ old('nombre') }}"
                           required>
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary">
                        Guardar
                    </button>
                </div>
            </form>

        </div>
    </div>

</div>
@endsection
