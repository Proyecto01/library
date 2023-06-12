@extends('layouts.app')
@section('content')

<div>
    <form action="{{ route('socios.store') }}" method="POST">
        <div class="main-form--header">
            <h2>Nuevo Socio</h2>
        </div>
        @include('socios._form')
    </form>
</div>
@endsection