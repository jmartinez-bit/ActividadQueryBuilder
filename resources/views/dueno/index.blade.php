@extends('layouts.app')
@section('title')
<h1>Dueño</h1>
@endsection
@section('content')
@if(session('status'))
    <div class="mensaje">
        <span><strong>{{ session('status') }}</strong></span>
    </div>
@endif
<div class="opcion">
    <div class="buscar">
        <form action="{{ route('dueno.buscar') }}" method="post">
            @csrf
            <label for="numero">Minimo de casas</label>
            <select name="numero" id="numero">
                <option disabled selected>Selecciona una opción</option>
                @for($i = 1; $i<=$numero; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
            <button type="submit">Buscar</button>
        </form>
    </div>
    <div class="add">
        <a href="{{ route('dueno.create') }}">Agregar</a>
    </div>
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
        @foreach($duenos as $dueno)
        <tr>
            <td>{{ $dueno->id }}</td>
            <td><a href="{{ route('dueno.show', $dueno->id) }}">{{ $dueno->ruc }}</a></td>
            <td>{{ $dueno->nombre }}</td>
            <td>{{ $dueno->apellido }}</td>
            <td><a href="{{ route('dueno.edit', $dueno->id) }}">Editar</a>
            <form action="{{ route('dueno.destroy', $dueno->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit"><i class="fas fa-trash-alt"></i></button>
            </form>
            </td>
        </tr>
        @endforeach
    </table>
</div><br>
<div class="duenos">
    <a href="{{ route('dueno.lista') }}">Listado de dueños con deudores</a>
</div>
@endsection