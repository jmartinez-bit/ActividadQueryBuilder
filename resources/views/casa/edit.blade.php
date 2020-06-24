@extends('layouts.app')
@section('title')
<h3>Actualizar Casa</h3>
@endsection
@section('content')
<div class="formulario">
    <form method="POST" action="{{ route('casa.update', $casa->id) }}">
        @method('PATCH') 
        @csrf
        <label for="ruc">RUC</label>
        <input type="text" placeholder="RUC" id="ruc" name="ruc" value="{{ $casa->ruc }}">
        @if($errors->has('ruc'))
            <span>
                <strong>{{ $errors->first('ruc') }}</strong>
            </span>
        @endif
        <label for="nro">Nombre</label>
        <input type="text" placeholder="nro" id="nro" name="nro" value="{{ $casa->nro }}">
        @if($errors->has('nro'))
            <span>
                <strong>{{ $errors->first('nro') }}</strong>
            </span>
        @endif
        <label for="calle">Calle</label>
        <input type="text" placeholder="Apellido" id="calle" name="calle" value="{{ $casa->calle }}">
        @if($errors->has('calle'))
            <span>
                <strong>{{ $errors->first('calle') }}</strong>
            </span>
        @endif
        <label for="comuna">Comuna</label>
        <input type="text" placeholder="Comuna" id="comuna" name="comuna" value="{{ $casa->comuna }}">
        @if($errors->has('comuna'))
            <span>
                <strong>{{ $errors->first('comuna') }}</strong>
            </span>
        @endif
        <input type="submit" value="Editar">
    </form>
</div>
@endsection