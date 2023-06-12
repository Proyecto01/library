@extends('layouts.app')
@section('content')

<div>
    <form action="{{ route('libros.store') }}" method="POST">
    <div class="main-form--header">
		<h2>Nuevo Libro</h2>
	</div>
        @include('libros._form')
    </form>
</div>
@endsection