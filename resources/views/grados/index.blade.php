@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Grados</h4>
        <a href="{{ route('grados.create') }}" class="btn btn-primary">
            + Nuevo Grado
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body">

            <table class="table table-bordered table-hover text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th width="180">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($grados as $grado)
                        <tr class="{{ $grado->activo ? '' : 'table-danger' }}">
                            <td>{{ $grado->id }}</td>
                            <td>{{ $grado->nombre }}</td>
                            <td>
                                @if($grado->activo)
                                    <form action="{{ route('grados.desactivar', $grado->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-warning">Desactivar</button>
                                    </form>
                                @else
                                    <form action="{{ route('grados.activar', $grado->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success">Activar</button>
                                    </form>
                                @endif

                            </td>
                            <td>
                                <a href="{{ route('grados.edit', $grado) }}"
                                   class="btn btn-sm btn-warning">
                                    Editar
                                </a>

                                <form action="{{ route('grados.destroy', $grado) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-secondary"
                                            onclick="return confirm('¿Cambiar estado?')">
                                        {{ $grado->activo ? 'Desactivar' : 'Activar' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No hay grados registrados</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection
