@extends('layouts.app')
@section('title')
<h1>Arrendatario</h1>
@endsection
@section('content')
@if(session('status'))
    <div class="mensaje">
        <span><strong>{{ session('status') }}</strong></span>
    </div>
@endif
<div class="add">
    <a href="{{ route('arrendatario.create') }}">Agregar</a>
</div>
<div class="tabla">
    <table>
        <tr>
            <th>ID</th>
            <th>RUC</th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>ACCIONES</th>
        </tr>
        @foreach($arrendatarios as $arrendatario)
        <tr>
            <td>{{ $arrendatario->id }}</td>
            <td>{{ $arrendatario->ruc }}</td>
            <td>{{ $arrendatario->nombre }}</td>
            <td>{{ $arrendatario->apellido }}</td>
            <td><a href="{{ route('arrendatario.edit', $arrendatario->id) }}">Editar</a>
            <form action="{{ route('arrendatario.destroy', $arrendatario->id) }}" method="post">
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
