@extends('layouts.app')
@section('content')
<div>
    <form action="{{ route('autores.update', $autor) }}" method="POST">
        <div class="main-form--header">
            <h2>Modificar Autor</h2>
        </div>
        @method('PUT')
        @include('autores._form')

    </form>
</div>
@endsection