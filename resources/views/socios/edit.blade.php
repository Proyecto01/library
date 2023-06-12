@extends('layouts.app')
@section('content')
<div>
    <form action="{{ route('socios.update', $socio) }}" method="POST">
        <div class="main-form--header">
            <h2>Modificar Socio</h2>
        </div>
        @method('PUT')
        @include('socios._form')

    </form>
</div>
@endsection