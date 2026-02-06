@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Nuevo Grado</h4>
        <a href="{{ route('grados.index') }}" class="btn btn-secondary">
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

            <form action="{{ route('grados.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nombre del grado</label>
                    <input
                        type="text"
                        name="nombre"
                        class="form-control"
                        placeholder="Ej. Primero, Segundo, Tercero"
                        value="{{ old('nombre') }}"
                        required
                    >
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        Guardar
                    </button>
                </div>
            </form>

        </div>
    </div>

</div>
@endsection
