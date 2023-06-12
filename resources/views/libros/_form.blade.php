@csrf
<div class="main-form-container">
	<div class="main-form--container">
		<div class="group">
			<label>Título</label>
			<span>@error('titulo') {{ $message }} @enderror</span>
			<input type="text" name="titulo"value="{{ old('titulo', $libro->titulo) }}">
		</div>
		<div class="group">
			<label>Autor</label>
			<span>@error('autor') {{ $message }} @enderror</span>
			<select name="autor_id" id="autor_id">
				@if(!is_null($libro->autor))
					@if (old('autor_id', $libro->autor->id) == "")
						<option value="0" selected></option>
					@else
						<option value="{{ $libro->autor->id }}" selected>{{ $libro->autor->nombre, $libro->autor->apellido }}</option>
					@endif
				@endif

				@forelse($autores as $autor)
					@if (is_null($libro->autor) || ($libro->autor->id !== $autor->id))
						@if (is_null($libro->autor))
							<option value="0" selected></option>
						@endif
						<option value="{{ $autor->id }}">{{ $autor->nombre, $autor->apellido }}</option>
					@endif
				@empty
					<option value="0" selected></option>
				@endforelse
			</select>
		</div>
		<div class="group">
			<label>Stock Total</label>
			<span>@error('cant_total') {{ $message }} @enderror</span>

			<input type="number" min="0" name="cant_total" value="{{ old('cant_total', $libro->cant_total) }}">
		</div>
		<div class="group">
			<label>Stock Disponible</label>
			<span>@error('disponibles') {{ $message }} @enderror</span>

			<input type="number" min="0" name="disponibles" value="{{ old('disponibles', $libro->disponibles) }}">
		</div>

		<div class="group--action">
			<input type="submit" value="Enviar">
			<a href="{{ route('libros.index') }}">Cancelar</a>
		</div>
	</div>
</div>