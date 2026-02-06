@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">Registrar Turno</h2>
        <a href="{{ route('turnos.index') }}" class="btn btn-secondary">
            Volver
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('turnos.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nombre del turno</label>
                    <input
                        type="text"
                        name="nombre"
                        class="form-control"
                        placeholder="Ej. Matutino"
                        required
                    >
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-success">
                        Guardar Turno
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
