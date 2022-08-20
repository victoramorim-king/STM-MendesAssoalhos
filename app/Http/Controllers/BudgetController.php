<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'consultor' => 'required',
            'cliente' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'data' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',


        ]);

        dd($request->all());
    }
   public function gerarPDF(){
    $pdf = PDF::loadView('pdf');
    return $pdf->setPaper('a3')->stream('pdf');
  }
}
