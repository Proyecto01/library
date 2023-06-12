@extends('layouts.app')
@section('content')

<div class="p-6 bg-white border-b border-gray-200">
    <form action="{{ route('autores.store') }}" method="POST">
        <div class="main-form--header">
            <h2>Nuevo Autor</h2>
        </div>
        @include('autores._form')
    </form>
</div>
@endsection