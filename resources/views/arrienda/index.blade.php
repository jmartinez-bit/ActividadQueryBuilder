@extends('layouts.app')
@section('title')
<h1>Arrienda</h1>
@endsection
@section('content')
@if(session('status'))
    <div class="mensaje">
        <span><strong>{{ session('status') }}</strong></span>
    </div>
@endif
<div class="opcion">
    <div class="buscar">
        <form action="{{ route('arrienda.buscar') }}" method="post">
            @csrf
            <label for="id">Dirección</label>
            <select name="id" id="id">
                <option disabled selected>Selecciona una opción</option>
                @foreach($casas as $casa)
                <option value="{{ $casa->id }}">{{ $casa->comuna.", ".$casa->calle.", ".$casa->nro }}</option>
                @endforeach
            </select>
            <button type="submit">Buscar</button>
        </form>
    </div>
    <div class="add">
        <a href="{{ route('arrienda.create') }}">Agregar</a>
    </div>
</div>
<div class="tabla">
    <table>
        <tr>
            <th>ID</th>
            <th>NOMBRES</th>
            <th>DIRECCIÓN CASA</th>
            <th>DEUDA</th>
            <th>ACCIONES</th>
        </tr>
        @foreach($arriendas as $arrienda)
        <tr>
            <td>{{ $arrienda->id }}</td>
            <td>{{ $arrienda->nombre." ".$arrienda->apellido }}</td>
            <td>{{ $arrienda->comuna.", ".$arrienda->calle.", ".$arrienda->nro }}</td>
            <td>@if($arrienda->deuda > 0) {{ $arrienda->deuda }} @else No hay deuda @endif</td>
            <td><a href="{{ route('arrienda.edit', $arrienda->id) }}">Editar</a>
            <form action="{{ route('arrienda.destroy', $arrienda->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit"><i class="fas fa-trash-alt"></i></button>
            </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection