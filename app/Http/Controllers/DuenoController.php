<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DuenoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $numero = DB::table('casa')->count();
        $duenos = DB::table('dueno')->get();
        return view('dueno.index', [
            'duenos' => $duenos,
            'numero' => $numero
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dueno.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validate($request, [
            'ruc' => 'required|numeric|digits:11|unique:dueno',
            'nombre' => 'required|string|max:45',
            'apellido' => 'required|string|max:45'
        ]);
        $dueno = DB::table('dueno')->insert([
            'ruc' => $request->input('ruc'),
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido')
        ]);
        return redirect()->route('dueno.index')->with('status', 'Dueño agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $arrendatarios = DB::table('arrendatario')
                        ->join('arrienda', 'arrendatario.ruc', '=', 'arrienda.ruc')
                        ->join('casa', 'arrienda.casa_id', '=', 'casa.id')
                        ->join('dueno', 'dueno.ruc', '=', 'casa.ruc')
                        ->select('arrendatario.*', 'arrienda.deuda')
                        ->where('dueno.id', '=', $id)
                        ->get();
        $deudaTotal = DB::table('arrienda')
                        ->join('casa', 'arrienda.casa_id', '=', 'casa.id')
                        ->join('dueno', 'dueno.ruc', '=', 'casa.ruc')
                        ->select('dueno.id', DB::raw('SUM(arrienda.deuda) as deudaTotal'))
                        ->groupBy('dueno.id')
                        ->having('dueno.id', '=', $id)
                        ->first();

        $dueno = DB::table('dueno')->where('id', $id)->first();
        return view('dueno.show', [
            'dueno' => $dueno,
            'deudaTotal' => $deudaTotal,
            'arrendatarios' => $arrendatarios
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dueno = DB::table('dueno')->where('id', $id)->first();
        return view('dueno.edit', [
            'dueno' => $dueno
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $this->validate($request, [
            'ruc' => 'required|numeric|digits:11|unique:dueno,ruc,'.$id,
            'nombre' => 'required|string|max:45',
            'apellido' => 'required|string|max:45'
        ]);
        $dueno = DB::table('dueno')->where('id', $id)->update([
            'ruc' => $request->input('ruc'),
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido')
        ]);
        return redirect()->route('dueno.index')->with('status', 'Dueño actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dueno = DB::table('dueno')->where('id', $id)->delete();
        return redirect()->route('dueno.index')->with('status','Dueño borrado correctamente');
    }

    public function buscar(Request $request) {
        $casaNumero = $request->input('numero');
        $duenos = DB::table('dueno')
                    ->join('casa', 'dueno.ruc', '=', 'casa.ruc')
                    ->select('dueno.id', 'dueno.ruc', 'dueno.nombre', 'dueno.apellido',DB::raw('count(casa.id) as numeroCasas'))
                    ->groupBy('dueno.id','dueno.ruc', 'dueno.nombre', 'dueno.apellido')
                    ->having('numeroCasas', '>=', $casaNumero)
                    ->get();
        $numero = DB::table('casa')->count();
        return view('dueno.index', [
            'duenos' => $duenos,
            'numero' => $numero
        ]);
    }

    public function listar() {
        $duenos = DB::table('dueno')
                    ->join('casa', 'dueno.ruc', '=', 'casa.ruc')
                    ->join('arrienda', 'casa.id', '=', 'arrienda.casa_id')
                    ->select(DB::raw('SUM(arrienda.deuda) as sumaDeuda'), 'dueno.ruc','dueno.nombre', 'dueno.apellido')
                    ->groupBy('dueno.id', 'dueno.ruc', 'dueno.nombre', 'dueno.apellido')
                    ->having('sumaDeuda', '>', 0)->get();
        
        return view('dueno.lista', [
            'duenos' => $duenos
        ]);
    }
}
