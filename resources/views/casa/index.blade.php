@extends('layouts.app')
@section('title')
<h1>Casa</h1>
@endsection
@section('content')
@if(session('status'))
    <div class="mensaje">
        <span><strong>{{ session('status') }}</strong></span>
    </div>
@endif
<div class="add">
    <a href="{{ route('casa.create') }}">Agregar</a>
</div>
<div class="tabla">
    <table>
        <tr>
            <th>ID</th>
            <th>RUC</th>
            <th>NRO</th>
            <th>CALLE</th>
            <th>COMUNA</th>
            <th>ACCIONES</th>
        </tr>
        @foreach($casas as $casa)
        <tr>
            <td>{{ $casa->id }}</td>
            <td>{{ $casa->ruc }}</td>
            <td>{{ $casa->nro }}</td>
            <td>{{ $casa->calle }}</td>
            <td>{{ $casa->comuna }}</td>
            <td><a href="{{ route('casa.edit', $casa->id) }}">Editar</a>
            <form action="{{ route('casa.destroy', $casa->id) }}" method="post">
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