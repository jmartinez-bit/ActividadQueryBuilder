@extends('layouts.app')
@section('title')
<h1>Telefono</h1>
@endsection
@section('content')
@if(session('status'))
    <div class="mensaje">
        <span><strong>{{ session('status') }}</strong></span>
    </div>
@endif
<div class="add">
    <a href="{{ route('telefono.create') }}">Agregar</a>
</div>
<div class="tabla">
    <table>
        <tr>
            <th>ID</th>
            <th>RUC</th>
            <th>NUMERO</th>
            <th>ACCIONES</th>
        </tr>
        @foreach($telefonos as $telefono)
        <tr>
            <td>{{ $telefono->id }}</td>
            <td>{{ $telefono->ruc }}</td>
            <td>{{ $telefono->numero }}</td>
            <td><a href="{{ route('telefono.edit', $telefono->id) }}">Editar</a>
            <form action="{{ route('telefono.destroy', $telefono->id) }}" method="post">
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