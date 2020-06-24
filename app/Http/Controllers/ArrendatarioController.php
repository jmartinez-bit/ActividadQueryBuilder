<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArrendatarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrendatarios = DB::table('arrendatario')->get();
        return view('arrendatario.index', [
            'arrendatarios' => $arrendatarios
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('arrendatario.create');
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
            'ruc' => 'required|numeric|digits:11|unique:arrendatario',
            'nombre' => 'required|string|max:45',
            'apellido' => 'required|string|max:45'
        ]);
        $arrendatario = DB::table('arrendatario')->insert([
            'ruc' => $request->input('ruc'),
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido')
        ]);
        return redirect()->route('arrendatario.index')->with('status', 'Arrendatario agregado correctamente');
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
        $arrendatario = DB::table('arrendatario')->where('id', $id)->first();
        return view('arrendatario.edit', [
            'arrendatario' => $arrendatario
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
            'ruc' => 'required|numeric|digits:11|unique:arrendatario,ruc,'.$id,
            'nombre' => 'required|string|max:45',
            'apellido' => 'required|string|max:45'
        ]);
        $arrendatario = DB::table('arrendatario')->where('id', $id)->update([
            'ruc' => $request->input('ruc'),
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido')
        ]);
        return redirect()->route('arrendatario.index')->with('status', 'Arrendatario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $arrendatario = DB::table('arrendatario')->where('id', $id)->delete();
        return redirect()->route('arrendatario.index')->with('status','Arrendatario borrado correctamente');
    }
}
