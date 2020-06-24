@extends('layouts.app')
@section('title')
<h3>Dueño: {{ $dueno->nombre." ".$dueno->apellido }}</h3>
@endsection
@section('content')
<div>
    <h4>Deudores</h4><br>
    <div>
        <table>
            <tr>
                <th>RUC</th>
                <th>NOMBRES</th>
                <th>DEUDAS</th>
            </tr>
            @foreach($arrendatarios as $arrendatario)
            <tr>
                <td>{{ $arrendatario->ruc }}</td>
                <td>{{ $arrendatario->nombre." ".$arrendatario->apellido }}</td>
                <td>@if($arrendatario->deuda > 0) {{ $arrendatario->deuda }} @else No hay deuda @endif</td>
            </tr>
            @endforeach
        </table>
    </div><br>
    @if ($deudaTotal)
    <div>
        <p>Deuda total: {{ $deudaTotal->deudaTotal }}</p>
    </div>
    @endif
</div>
@endsection