@extends('layouts.app')
@section('title')
<h3>Actualizar Telefono</h3>
@endsection
@section('content')
<div class="formulario">
    <form method="POST" action="{{ route('telefono.update', $telefono->id) }}">
        @method('PATCH') 
        @csrf
        <label for="numero">Numero</label>
        <input type="text" placeholder="Numero" id="numero" name="numero" value="{{ $telefono->numero }}">
        @if($errors->has('numero'))
            <span>
                <strong>{{ $errors->first('numero') }}</strong>
            </span>
        @endif
        <input type="submit" value="Editar">
    </form>
</div>
@endsection