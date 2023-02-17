<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Sorteio extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index($nome){
        $sorteio = DB::table($nome)
        ->select('id_sorteio')->first();

        $numeros = DB::table($nome)->get();

        $sorteio = DB::table('tbl_sorteios')->where('tbl_sorteios.id', '=', $sorteio->id_sorteio)->first();
        $user_name = Auth::user()->name;
        $user_email = Auth::user()->email;
        return view('sorteios.sorteio', [
            'sorteio' => $sorteio,
            'numbers' => $numeros,
            'user_name' => $user_name,
            'user_email' => $user_email
        ]);
    }
}
