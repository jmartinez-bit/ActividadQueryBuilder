@extends('layouts.app')
@section('title')
<h3>Agregar Telefono</h3>
@endsection
@section('content')
<div class="formulario">
    <form action="{{ route('telefono.store') }}" method="POST">
        @csrf
        <label for="ruc">RUC</label>
        <input type="text" placeholder="RUC" id="ruc" name="ruc" value="{{ old('ruc') }}">
        @if($errors->has('ruc'))
            <span>
                <strong>{{ $errors->first('ruc') }}</strong>
            </span>
        @endif
        <label for="numero">Numero</label>
        <input type="text" placeholder="Numero" id="numero" name="numero" value="{{ old('numero') }}">
        @if($errors->has('numero'))
            <span>
                <strong>{{ $errors->first('numero') }}</strong>
            </span>
        @endif
        <input type="submit" value="Agregar">
    </form>
</div>
@endsection