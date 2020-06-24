<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $casas = DB::table('casa')->get();
        return view('casa.index', [
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
        return view('casa.create');
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
            'ruc' => 'required|numeric|digits:11|exists:dueno',
            'nro' => 'required|numeric',
            'calle' => 'required|string|max:255',
            'comuna' => 'required|string|max:255'
        ]);
        $casa = DB::table('casa')->insert([
            'ruc' => $request->input('ruc'),
            'nro' => $request->input('nro'),
            'calle' => $request->input('calle'),
            'comuna' => $request->input('comuna')
        ]);
        return redirect()->route('casa.index')->with('status', 'Casa agregada correctamente');
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
        $casa = DB::table('casa')->where('id', $id)->first();
        return view('casa.edit', [
            'casa' => $casa
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
            'ruc' => 'required|numeric|digits:11|exists:dueno',
            'nro' => 'required|numeric',
            'calle' => 'required|string|max:255',
            'comuna' => 'required|string|max:255'
        ]);
        $casa = DB::table('casa')->where('id', $id)->update([
            'ruc' => $request->input('ruc'),
            'nro' => $request->input('nro'),
            'calle' => $request->input('calle'),
            'comuna' => $request->input('comuna')
        ]);
        return redirect()->route('casa.index')->with('status', 'Casa actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $casa = DB::table('casa')->where('id', $id)->delete();
        return redirect()->route('casa.index')->with('status','Casa borrada correctamente');
    }
}
