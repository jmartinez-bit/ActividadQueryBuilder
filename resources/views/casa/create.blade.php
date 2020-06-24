@extends('layouts.app')
@section('title')
<h3>Agregar Casa</h3>
@endsection
@section('content')
<div class="formulario">
    <form action="{{ route('casa.store') }}" method="POST">
        @csrf
        <label for="ruc">RUC</label>
        <input type="text" placeholder="RUC" id="ruc" name="ruc" value="{{ old('ruc') }}">
        @if($errors->has('ruc'))
            <span>
                <strong>{{ $errors->first('ruc') }}</strong>
            </span>
        @endif
        <label for="nro">nro</label>
        <input type="text" placeholder="nro" id="nro" name="nro" value="{{ old('nro') }}">
        @if($errors->has('nro'))
            <span>
                <strong>{{ $errors->first('nro') }}</strong>
            </span>
        @endif
        <label for="calle">Calle</label>
        <input type="text" placeholder="Calle" id="calle" name="calle" value="{{ old('calle') }}">
        @if($errors->has('calle'))
            <span>
                <strong>{{ $errors->first('calle') }}</strong>
            </span>
        @endif
        <label for="comuna">Comuna</label>
        <input type="text" placeholder="Comuna" id="comuna" name="comuna" value="{{ old('comuna') }}">
        @if($errors->has('calle'))
            <span>
                <strong>{{ $errors->first('comuna') }}</strong>
            </span>
        @endif
        <input type="submit" value="Agregar">
    </form>
</div>
@endsection