@extends('layouts.app')
@section('title')
<h1>Personas</h1>
@endsection
@section('content')
<table>
    <tr>
        <th>RUC</th>
        <th>NOMBRE</th>
        <th>APELLIDO</th>
    </tr>
    @foreach($duenos as $dueno)
    <tr>
        <td>{{ $dueno->ruc }}</td>
        <td>{{ $dueno->nombre }}</td>
        <td>{{ $dueno->apellido }}</td>
    </tr>
    @endforeach
    @foreach($arrendatarios as $arrendatario)
    <tr>
        <td>{{ $arrendatario->ruc }}</td>
        <td>{{ $arrendatario->nombre }}</td>
        <td>{{ $arrendatario->apellido }}</td>
    </tr>
    @endforeach
</table>
@endsection