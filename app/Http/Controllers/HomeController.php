<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function redireccion() {
        return redirect('/index');
    }

    public function index() {
        return view('index');
    }
    public function listar() {
        $duenos = DB::table('dueno')->get();
        $arrendatarios = DB::table('arrendatario')->get();
        return view('persona.index', [
            'duenos' => $duenos,
            'arrendatarios' => $arrendatarios
        ]);
    }
    
}
