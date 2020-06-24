@extends('layouts.app')
@section('title')
<h3>Agregar Arrienda</h3>
@endsection
@section('content')
<div class="formulario">
    <form action="{{ route('arrienda.store') }}" method="POST">
        @csrf
        <label for="ruc">RUC</label>
        <input type="text" placeholder="RUC" id="ruc" name="ruc" value="{{ old('ruc') }}">
        @if($errors->has('ruc'))
            <span>
                <strong>{{ $errors->first('ruc') }}</strong>
            </span>
        @endif
        <label for="casas">Casas</label>
        <select name="casa_id" id="casa_id">
            <option disabled selected>Selecciona una opción</option>
            @foreach($casas as $casa)
            <option value="{{ $casa->id }}">{{ $casa->comuna.", ".$casa->calle.", ".$casa->nro }}</option>
            @endforeach
        </select>
        @if($errors->has('casa_id'))
            <span>
                <strong>{{ $errors->first('casa_id') }}</strong>
            </span>
        @endif
        <label for="deuda">Deuda</label>
        <input type="text" placeholder="Deuda" id="deuda" name="deuda" value="{{ old('deuda') }}">
        @if($errors->has('deuda'))
            <span>
                <strong>{{ $errors->first('deuda') }}</strong>
            </span>
        @endif
        <input type="submit" value="Agregar">
    </form>
</div>
@endsection