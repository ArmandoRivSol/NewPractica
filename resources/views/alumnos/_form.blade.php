@csrf

<div class="row">

    <div class="col-md-4 mb-3">
        <label class="form-label">Nombre</label>
        <input type="text"
               name="nombre"
               class="form-control"
               value="{{ old('nombre', $alumno->nombre ?? '') }}"
               required>
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Apellido Paterno</label>
        <input type="text"
               name="apellido_paterno"
               class="form-control"
               value="{{ old('apellido_paterno', $alumno->apellido_paterno ?? '') }}"
               required>
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Apellido Materno</label>
        <input type="text"
               name="apellido_materno"
               class="form-control"
               value="{{ old('apellido_materno', $alumno->apellido_materno ?? '') }}"
               required>
    </div>

</div>

<div class="row">

    <div class="col-md-6 mb-3">
        <label class="form-label">Carrera</label>
        <select name="carrera_id" class="form-select" required>
            <option value="">Seleccione una carrera</option>
            @foreach($carreras as $carrera)
                <option value="{{ $carrera->id }}"
                    {{ old('carrera_id', $alumno->carrera_id ?? '') == $carrera->id ? 'selected' : '' }}>
                    {{ $carrera->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Grupo</label>
        <select name="grupo_id" class="form-select" required>
            <option value="">Seleccione un grupo</option>
            @foreach($grupos as $grupo)
                <option value="{{ $grupo->id }}"
                    {{ old('grupo_id', $alumno->grupo_id ?? '') == $grupo->id ? 'selected' : '' }}>
                    {{ $grupo->clave }} - {{ $grupo->numero_grupo }}
                </option>
            @endforeach
        </select>
    </div>

</div>

<div class="text-end mt-3">
    <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">
        Cancelar
    </a>
    <button type="submit" class="btn btn-success">
        Guardar
    </button>
</div>
