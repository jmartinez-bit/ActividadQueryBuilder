@extends('layouts.app')
@section('title')
<h3>Actualizar arrienda</h3>
@endsection
@section('content')
<div class="formulario">
    <form method="POST" action="{{ route('arrienda.update', $arrienda->id) }}">
        @method('PATCH') 
        @csrf
        <label for="ruc">RUC</label>
        <input type="text" placeholder="RUC" id="ruc" name="ruc" value="{{ $arrienda->ruc }}">
        @if($errors->has('ruc'))
            <span>
                <strong>{{ $errors->first('ruc') }}</strong>
            </span>
        @endif
        <label for="casas">Casa</label>
        <select name="casa_id" id="casa_id">
            <option value="{{ $arrienda->casa_id }}">{{ $arrienda->comuna.", ".$arrienda->calle.", ".$arrienda->nro }}</option>
            @foreach($casas as $casa)
            <option value="{{ $casa->id }}">{{ $casa->comuna.", ".$casa->calle.", ".$casa->nro }}</option>
            @endforeach
        </select>
        @if($errors->has('casa_id'))
            <span>
                <strong>{{ $errors->first('casa_id') }}</strong>
            </span>
        @endif
        <label for="deuda">DEUDA</label>
        <input type="text" placeholder="Deuda" id="deuda" name="deuda" value="{{ $arrienda->deuda }}">
        @if($errors->has('deuda'))
            <span>
                <strong>{{ $errors->first('deuda') }}</strong>
            </span>
        @endif
        <input type="submit" value="Editar">
    </form>
</div>
@endsection