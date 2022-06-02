<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoas;
use App\Protocolos;

class PdfController extends Controller
{
    public function gerar(){
        $pessoas = Pessoas::all();

        $pdf = \PDF::loadView('pdf', compact('pessoas'));
        error_log("passo2");
        return $pdf->stream('exemplo.pdf');
    }

    public function gerarProtocolo(){
        $protocolos = Protocolos::all();

        $pdf = \PDF::loadView('pdf_protocolos', compact('protocolos'));
        error_log("passo2");
        return $pdf->stream('exemplo2.pdf');
    }
}
