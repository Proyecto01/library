@csrf
<div class="main-form-container">
	<div class="main-form--container">
		<div class="group">
			<label>Nombre</label>
			<span>@error('nombre') {{ $message }} @enderror</span>

			<input type="text" name="nombre" value="{{ old('nombre', $socio->nombre) }}">
		</div>
		
		<div class="group">
			<label>Apellido</label>
			<span>@error('apellido') {{ $message }} @enderror</span>

			<input type="text" name="apellido" value="{{ old('apellido', $socio->apellido) }}">
		</div>
		
		<div class="group">
			<label>Telefono</label>
			<span>@error('telefono') {{ $message }} @enderror</span>

			<input type="text" name="telefono" value="{{ old('telefono', $socio->telefono) }}">
		</div>		
		
		<div class="group">
			<label>Limite de Prestamos</label>
			<span>@error('prestados') {{ $message }} @enderror</span>

			<input type="number" min="0" name="prestados" value="{{ old('prestados', $socio->prestados) }}">
		</div>

		<div class="group">
			<label>Estado</label>
			<div class="grupo--status">
				<input type="radio" name="activo" value="1" @if ($socio->activo) {{"checked"}} @endif>
				<label for="activo" class="radio">Activo</label>
				<input type="radio" name="activo" value="0" @if (!$socio->activo) {{"checked"}} @endif>
				<label for="desactivo" class="radio">Desactivo</label>
			</div>
		</div>

		<div class="group--action">
			<input type="submit" value="Enviar">
			<a href="{{ route('socios.index') }}">Cancelar</a>
		</div>
	</div>
</div>