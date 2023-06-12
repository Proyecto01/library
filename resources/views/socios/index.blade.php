@extends('layouts.app')
@section('content')

    <div class="main-table-container">
        <div class="main-table--header">
            <h2>Lista de Socios</h2>
            <a href="{{ route('socios.create') }}">Crear</a>
        </div>        
        <div class="main-table--container">

            @if ($socios->isEmpty())
                <p> No hay Socios.</p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th class="main-table--long-column">Nombre</th>
                            <th class="main-table--long-column">Apellido</th>
                            <th>Telefono</th>
                            <th>Prestados</th>
                            <th>Activo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($socios as $socio)
                            <tr>
                                <td>
                                    <a href="{{ route('socios.edit', $socio) }}">
                                        {{ $socio->id }}
                                    </a>
                                </td>
                                <td>{{ $socio->nombre }}</td>
                                <td>{{ $socio->apellido }}</td>
                                <td>{{ $socio->telefono }}</td>
                                <td>{{ $socio->prestados }}</td>
                                <td>{{ $socio->activo }}</td>
                                <td>
                                    <form action="{{ route('socios.destroy', $socio) }}" method="POST">
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
                {{ $socios->links() }}
            </div>
        </div>
    </div>

@endsection