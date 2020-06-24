@extends('layouts.app')
@section('title')
<h3>Agregar Dueño</h3>
@endsection
@section('content')
<div class="formulario">
    <form action="{{ route('dueno.store') }}" method="POST">
        @csrf
        <label for="ruc">RUC</label>
        <input type="text" placeholder="RUC" id="ruc" name="ruc" value="{{ old('ruc') }}">
        @if($errors->has('ruc'))
            <span>
                <strong>{{ $errors->first('ruc') }}</strong>
            </span>
        @endif
        <label for="nombre">Nombre</label>
        <input type="text" placeholder="Nombre" id="nombre" name="nombre" value="{{ old('nombre') }}">
        @if($errors->has('nombre'))
            <span>
                <strong>{{ $errors->first('nombre') }}</strong>
            </span>
        @endif
        <label for="apellido">Apellido</label>
        <input type="text" placeholder="Apellido" id="apellido" name="apellido" value="{{ old('apellido') }}">
        @if($errors->has('apellido'))
            <span>
                <strong>{{ $errors->first('apellido') }}</strong>
            </span>
        @endif
        <input type="submit" value="Agregar">
    </form>
</div>
@endsection