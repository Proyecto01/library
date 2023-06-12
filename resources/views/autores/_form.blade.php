@csrf
<div class="main-form-container">
    <div class="main-form--container">
        <div class="group">
            <label>Nombre</label>
            <span>@error('nombre') {{ $message }} @enderror</span>

            <input type="text" name="nombre" value="{{ old('nombre', $autor->nombre) }}">
        </div>
        <div class="group">
            <label>Apellido</label>
            <span>@error('apellido') {{ $message }} @enderror</span>

            <input type="text" name="apellido" value="{{ old('apellido', $autor->apellido) }}">
        </div>
        <div class="group--action">
            <input type="submit" value="Enviar">
            <a href="{{ route('autores.index') }}"> Cancelar</a>
        </div>
    </div>
</div>