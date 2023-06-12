@extends('layouts.app')
@section('content')

    <div class="main-table-container">
        <div class="main-table--header">
            <h2>Lista de autores </h2>
            <a href="{{ route('autores.create') }}">Crear</a>
        </div>
        <div class="main-table--container">
            @if ($autores->isEmpty())
                <p> No hay Autores.</p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th class="main-table--short-column">ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th class="main-table--short-column"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($autores as $autor)
                            <tr>
                                <td>
                                    <a href="{{ route('autores.edit', $autor) }}">
                                        {{ $autor->id }}
                                    </a>
                                </td>
                                <td>{{ $autor->nombre }}</td>
                                <td>{{ $autor->apellido }}</td>
                                <td>
                                    <form action="{{ route('autores.destroy', $autor) }}" method="POST">
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
                {{ $autores->links() }}
            </div>
        </div>
    </div>

@endsection