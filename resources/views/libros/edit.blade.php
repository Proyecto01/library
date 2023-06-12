@extends('layouts.app')
@section('content')
<div>
    <form action="{{ route('libros.update', $libro) }}" method="POST">
        <div class="main-form--header">
            <h2>Modificar Libro</h2>
        </div>
        @method('PUT')
        @include('libros._form')

    </form>
</div>
@endsection