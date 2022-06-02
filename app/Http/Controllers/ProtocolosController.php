<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoas;
use App\Protocolos;
use Illuminate\Support\Facades\Auth;
use App\Anexos;

class ProtocolosController extends Controller
{
    public function index(){
        $pessoas = Pessoas::all();
        return view('cadastro_protocolos', compact('pessoas'));
    }

    public function store(Request $request){
        $request->validate([
            'descricao' => ['required', 'string'],
            'data' => ['required', 'date_format:Y-m-d'],
            'prazo' => ['required', 'integer'],
            'pessoa' => ['required', 'integer']
        ],

        [
            'descricao.required' => 'O campo de descrição é obrigatorio!',
            'data.required' => 'O campo de data é obrigatorio!',
            'prazo.required' => 'O campo de prazo é obrigatorio!',
            'pessoa.required' => 'Por favor, selecione um receptor'
        ],


    );
        //$atendente = Auth::user()->id;
        $descricao = $request->descricao;
        $data = $request->data;
        $prazo = $request->prazo;
        $pessoa = $request->pessoa;


        $protocoloCriado = Protocolos::create([
            'atendente' => 1,
            'descricao' => $descricao,
            'data' => $data,
            'prazo' => $prazo,
            'receptor' => $pessoa

        ]);

        if(!empty($request->allFiles()['anexos'])){
            error_log("passo2");
            for($i = 0; $i <count($request->allFiles()['anexos']); $i++){
               $arquivo = $request->allFiles()['anexos'][$i];

               $anexo = new Anexos();
               $anexo->protocolo()->associate($protocoloCriado);
               $anexo->arquivo = $arquivo->store('arquivos/'.$protocoloCriado->id);

               $anexo->save();
              // array_push($cursos, $curso);
              // unset($cursos);
            }
           }

        
        return redirect()->back()->with('success', 'Seu protocolo foi criado!'); 
    }

    public function exibirTodos(Request $request){
        $protocolos = Protocolos::all();

        return view('tabela_protocolos', compact('protocolos'));

    }

    public function filter(Request $request){
        $protocolos = new Protocolos();
       

        $protocolos = $protocolos->where(function ($query) use ($request){
    
            if($request->search){
                 $query->where('descricao', "LIKE", "%{$request->search}%"); 
            }
            if($request->data_inicial && $request->data_final){
                $query->whereDate('prazo', ">=", $request->data_inicial)->whereDate('prazo', "<=", $request->data_final);
            }
            
            })->get();
        
    

        return view('protocolo_exibir', compact('protocolos'));
    }

    public function destroy($id){
        $protocolo = Protocolos::find($id);

        if($protocolo){
            $protocolo->delete();
            return redirect()->route('lista_protocolos')->with('success', 'Registro excluido com sucesso!');
        }

        return redirect()->back();

        
        
    }
    public function editarIndex($id){
        $protocolo = Protocolos::find($id);
        $pessoas = Pessoas::all();

        if($protocolo){
            return view('editar_protocolos', compact('protocolo', 'pessoas'));
            
        }
            return redirect()->back();
    }

    public function update(Request $request){

        $protocolo = Protocolos::find($request->protocolo_id);

        if(!$protocolo){
            return redirect()->back();  
        }

        $request->validate([
            'descricao' => ['required', 'string'],
            'data' => ['required', 'date_format:Y-m-d'],
            'prazo' => ['required', 'integer'],
            'pessoa' => ['required', 'integer']
            ],

            [
            'descricao.required' => 'O campo de descrição é obrigatorio!',
            'data.required' => 'O campo de data é obrigatorio!',
            'prazo.required' => 'O campo de prazo é obrigatorio!',
            'pessoa.required' => 'Por favor, selecione um receptor'
            ],
        );
        
        $protocoloUpdate = $protocolo->update([
            'descricao' => $request->descricao,
            'data' => $request->data,
            'prazo' => $request->prazo,
            'receptor' => $request->pessoa

        ]);

        return redirect()->route('lista_protocolos')->with('success', 'Dados editados com sucesso!');
    }




}


