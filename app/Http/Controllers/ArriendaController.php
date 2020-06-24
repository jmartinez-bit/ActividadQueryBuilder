<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArriendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $casas = DB::table('arrienda')
                        ->join('casa', 'arrienda.casa_id', '=', 'casa.id')
                        ->join('arrendatario', 'arrienda.ruc', '=', 'arrendatario.ruc')
                        ->select('arrienda.*', 'casa.comuna', 'casa.calle', 'casa.nro',
                        'arrendatario.nombre','arrendatario.apellido')->get();
        $arriendas = DB::table('arrienda')->orderBy('id')
                        ->join('casa', 'arrienda.casa_id', '=', 'casa.id')
                        ->join('arrendatario', 'arrienda.ruc', '=', 'arrendatario.ruc')
                        ->select('arrienda.*', 'casa.comuna', 'casa.calle', 'casa.nro',
                        'arrendatario.nombre','arrendatario.apellido')->get();
        return view('arrienda.index', [
            'arriendas' => $arriendas,
            'casas' => $casas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $casas = DB::table('arrienda')
                        ->rightJoin('casa', 'arrienda.casa_id', '=', 'casa.id')
                        ->where('arrienda.casa_id', null)->get();
        return view('arrienda.create', [
            'casas' => $casas
        ]);
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
            'ruc' => 'required|numeric|digits:11|exists:arrendatario',
            'casa_id' => 'required|numeric|unique:arrienda',
            'deuda' => 'required|numeric|min:0',
        ]);
        $arrienda = DB::table('arrienda')->insert([
            'ruc' => $request->input('ruc'),
            'casa_id' => $request->input('casa_id'),
            'deuda' => $request->input('deuda'),
        ]);
        return redirect()->route('arrienda.index')->with('status', 'Arrienda agregada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $casas = DB::table('arrienda')
                        ->rightJoin('casa', 'arrienda.casa_id', '=', 'casa.id')
                        ->where('arrienda.casa_id', null)->get();
        $arrienda = DB::table('arrienda')
                        ->join('casa', 'arrienda.casa_id', '=', 'casa.id')
                        ->where('arrienda.id', $id)
                        ->select('arrienda.*', 'casa.comuna', 'casa.calle', 'casa.nro')->first();

        return view('arrienda.edit', [
            'casas' => $casas,
            'arrienda' => $arrienda,
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
            'ruc' => 'required|numeric|digits:11|exists:arrendatario',
            'casa_id' => 'required|numeric|unique:arrienda,casa_id,'.$id,
            'deuda' => 'required|numeric',
        ]);
        $arrienda = DB::table('arrienda')->where('id', $id)->update([
            'ruc' => $request->input('ruc'),
            'casa_id' => $request->input('casa_id'),
            'deuda' => $request->input('deuda')
        ]);
        return redirect()->route('arrienda.index')->with('status', 'Arrienda actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $arrienda = DB::table('arrienda')->where('id', $id)->delete();
        return redirect()->route('arrienda.index')->with('status','Arrienda borrado correctamente');
    }

    public function buscar(Request $request) {
        $id = $request->input('id');
        $casas = DB::table('arrienda')
                        ->join('casa', 'arrienda.casa_id', '=', 'casa.id')
                        ->join('arrendatario', 'arrienda.ruc', '=', 'arrendatario.ruc')
                        ->select('arrienda.*', 'casa.comuna', 'casa.calle', 'casa.nro',
                        'arrendatario.nombre','arrendatario.apellido')->get();
        $arriendas = DB::table('arrienda')->orderBy('id')
                        ->join('casa', 'arrienda.casa_id', '=', 'casa.id')
                        ->join('arrendatario', 'arrienda.ruc', '=', 'arrendatario.ruc')
                        ->where('arrienda.id', $id)->select('arrienda.*', 'casa.comuna', 'casa.calle', 'casa.nro',
                        'arrendatario.nombre','arrendatario.apellido')->get();
        return view('arrienda.index', [
            'arriendas' => $arriendas,
            'casas' => $casas
        ]);
    }
}
