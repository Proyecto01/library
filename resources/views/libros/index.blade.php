@extends('layouts.app')
@section('content')
    

    <div class="main-table-container">
        <div class="main-table--header">
            <h2>Lista de Libros </h2>
            <a href="{{ route('libros.create') }}">Crear</a>
        </div>
        <div class="main-table--container">
            @if ($libros->isEmpty())
                <p> No hay Libros.</p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th class="main-table--long-column">Titulo</th>
                            <th class="main-table--long-column">Autor</th>
                            <th># Total</th>
                            <th># Disponibles</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($libros as $libro)
                            <tr>
                                <td>
                                    <a href="{{ route('libros.edit', $libro) }}">
                                        {{ $libro->id }}
                                    </a>
                                </td>
                                <td>{{ $libro->titulo }}</td>
                                @php
                                    $autor = is_null($libro->autor)? "" : $libro->autor->nombre . " " . $libro->autor->apellido;
                                @endphp
                                <td>{{ $autor }}</td>
                                <td>{{ $libro->cant_total }}</td>
                                <td>{{ $libro->disponibles }}</td>
                                <td>
                                    <form action="{{ route('libros.destroy', $libro) }}" method="POST">
                                        @csrf 
                                        @method('DELETE')

                                        <input 
                                            type="submit" 
                                            value="Eliminar" 
                                            class="table--action"
                                            onclick="return confirm('¿Desea Eliminar?')"
                                        >
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            <div class="pagination">
                {{ $libros->links() }}
            </div>
        </div>
    </div>

@endsection