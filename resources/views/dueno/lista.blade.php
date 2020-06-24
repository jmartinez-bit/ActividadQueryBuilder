@extends('layouts.app')
@section('title')
<h3>Listado de dueños con deudas</h3>
@endsection
@section('content')
<table>
    <tr>
        <th>RUC</th>
        <th>NOMBRE</th>
        <th>APELLIDO</th>
    @foreach($duenos as $dueno)
    </tr>
        <td>{{ $dueno->ruc }}</td>
        <td>{{ $dueno->nombre }}</td>
        <td>{{ $dueno->apellido }}</td>
    <tr>
    @endforeach
</table>
@endsection