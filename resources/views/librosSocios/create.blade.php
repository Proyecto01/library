@extends('layouts.app')
@section('content')

<div>
    <form action="{{ route('prestamos.store') }}" method="POST">
        @csrf
        <div class="main-form-container">
            <div class="main-form--header">
                <h2>Nuevo Prestamo</h2>
            </div>
            <div class="main-form--container">
                <div class="group">
                    <label>Libro</label>
                    <span>@error('libro') {{ $message }} @enderror</span>

                    
                    <select name="libro_id" id="libro_id">
                        @if($libros->count() > 0)
                            <option value="0"></option>
                            @foreach ($libros as $libro)
                                @php
                                    $descLibro = is_null($libro->autor)? $libro->titulo : $libro->titulo . " by " . $libro->autor->apellido . ", " . $libro->autor->nombre;
                                @endphp
                                <option value="{{$libro->id}}">{{ $descLibro }}</option>
                            @endforeach
                        @else
                            <option value="0"></option>
                        @endif
                    </select>
                </div>
                <div class="group">
                    <label>Socio</label>
                    <span>@error('socio') {{ $message }} @enderror</span>

                    <select name="socio_id" id="socio_id">
                        @if($socios->count() > 0)
                            <option value="0"></option>
                            @foreach ($socios as $socio)
                                @php
                                    $descSocio = $socio->apellido . ", " . $socio->nombre;
                                @endphp
                                <option value="{{$socio->id}}">{{ $descSocio }}</option>
                            @endforeach
                        @else
                            <option value="0"></option>
                        @endif
                    </select>
                </div>

                <div class="group--action">
                    <input type="submit" value="Enviar">
                    <a href="{{ route('prestamos.index') }}">Cancelar</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection