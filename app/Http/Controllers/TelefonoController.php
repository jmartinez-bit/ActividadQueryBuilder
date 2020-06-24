<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TelefonoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $telefonos = DB::table('telefono')->get();
        return view('telefono.index', [
            'telefonos' => $telefonos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('telefono.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ruc = $request->input('ruc');
        $duenos = DB::table('dueno')->where('ruc', $ruc)->first();
        if($duenos === null) {
            $mensaje = 'exists:arrendatario';
        }else {
            $mensaje = 'exists:dueno';
        }
        
  
        $validate = $this->validate($request, [
            'ruc' => 'required|numeric|digits:11|'.$mensaje,
            'numero' => 'required|numeric|digits:9|unique:telefono',
        ]);
        $telefono = DB::table('telefono')->insert([
            'ruc' => $request->input('ruc'),
            'numero' => $request->input('numero'),
        ]);
        return redirect()->route('telefono.index')->with('status', 'Telefono agregado correctamente');
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
        $telefono = DB::table('telefono')->where('id', $id)->first();
        return view('telefono.edit', [
            'telefono' => $telefono
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
            'numero' => 'required|numeric|digits:9|unique:telefono,numero,'.$id,
        ]);

        $telefono = DB::table('telefono')->where('id', $id)->update([
            'numero' => $request->input('numero'),
        ]);
        return redirect()->route('telefono.index')->with('status', 'Telefono actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $telefono = DB::table('telefono')->where('id', $id)->delete();
        return redirect()->route('telefono.index')->with('status','Telefono borrado correctamente');
    }
}
