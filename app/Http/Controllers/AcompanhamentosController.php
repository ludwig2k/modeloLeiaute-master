<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoas;
use App\Protocolos;
use App\Acompanhamentos;
use Illuminate\Support\Facades\Auth;

class AcompanhamentosController extends Controller
{
    public function acompIndex(){
        $protocolos = Protocolos::all();
        $pessoas = Pessoas::all();
        return view('acompanhamentos', compact('protocolos', 'pessoas'));
    }

    public function acompStore(Request $request){
        $request->validate([
            'observacao' => ['required', 'string'],
            'data1' => ['required', 'date_format:Y-m-d'],
            'protocolo_id1' => ['required', 'integer']
        ],

        [
            'observacao.required' => 'O campo de observação é obrigatorio!',
            'data1.required' => 'O campo de data é obrigatorio!',
            'protocolo.required' => 'Por favor, selecione um protocolo!'
        ],


    );
        $observacao = $request->observacao;
        $data1 = $request->data1;
        $protocolo_id1 = $request->protocolo_id1;


        $acompanhamentoCriado = Acompanhamentos::create([
            'usuario' => 1,
            'observacao' => $observacao,
            'data1' => $data1,
            'protocolo_id1' => $protocolo_id1

        ]);

        return redirect()->back()->with('success', 'Um acompanhamento foi adicionado ao protocolo!');
    }
}
