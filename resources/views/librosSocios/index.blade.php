@extends('layouts.app')
@section('content')

    <div class="main-table-container">
        <div class="main-table--header">
            <h2>Lista de Libros Prestados</h2>
            <a href="{{ route('prestamos.create') }}">Crear</a>
        </div>
        <div class="main-table--container">
            @if ($librosSocios->isEmpty())
                <p> No hay Libros Prestados.</p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Socio ID</th>
                            <th>Libro ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($librosSocios as $libroSocio)
                            <tr>
                                <td>{{ $libroSocio->id }}</td>
                                <td>{{ $libroSocio->libro_id }}</td>
                                <td>{{ $libroSocio->socio_id }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            <div class="pagination">
                {{ $librosSocios->links() }}
            </div>
        </div>
    </div>

@endsection