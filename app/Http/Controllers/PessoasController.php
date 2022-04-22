<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoas;
use Carbon\Carbon;


class PessoasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pessoas');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string'],
            'sexo' => ['required', 'string'],
            'data_nascimento' => ['required', 'date_format:Y-m-d'],
            'cpf' => ['required', 'string']
        ],
        [
            'nome.required' => 'O campo de nome é obrigatorio!',
            'sexo.required' => 'O campo de sexo é obrigatorio!',
            'data_nascimento.required' => 'O campo de data de nascimento é obrigatorio!',
            'cpf.required' => 'O campo de CPF é obrigatorio!'
        ],
    );
        
        $nome = $request->nome;
        $sexo = $request->sexo;
        $cidade = $request->cidade;
        $bairro = $request->bairro;
        $rua = $request->rua;
        $complemento = $request->complemento;
        $data_nascimento  = $request->data_nascimento;
        $cpf = $request->cpf;
        

        $pessoaCriada = Pessoas::create([
            'nome' => $nome,
            'sexo' => $sexo,
            'cidade' => $cidade,
            'bairro' => $bairro,
            'rua' => $rua,
            'complemento' => $complemento,
            'data_nascimento' => $data_nascimento,
            'cpf' => $cpf
        ]);
        return redirect()->back()->with('success', 'Seu cadastro foi Realizado!');   
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
    public function editarIndex($id)
    {
        $pessoa = Pessoas::find($id);

        if($pessoa){
            return view('pessoas_editar', compact('pessoa'));
            
        }
            return redirect()->back();
    }

    public function exibirTodos(Request $request){
        $pessoas = Pessoas::all();

        return view('tabela', compact('pessoas'));

    }

    public function filter(Request $request){
        $pessoas = new Pessoas();
       

        $pessoas = $pessoas->where(function ($query) use ($request){
    
            if($request->search){
                 $query->where('nome', "LIKE", "%{$request->search}%"); 
            }
            
            if($request->data_inicial && $request->data_final){
                $query->whereDate('data_nascimento', ">=", $request->data_inicial)->whereDate('data_nascimento', "<=", $request->data_final);
            }
            
            })->get();
        
    

        return view('pessoas_exibir', compact('pessoas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){

        $pessoa = Pessoas::find($request->pessoa_id);
        if(!$pessoa){
            return redirect()->back();  
        }

        $request->validate([
            'nome' => ['required', 'string'],
            'sexo' => ['required', 'string'],
            'data_nascimento' => ['required', 'date_format:Y-m-d'],
            'cpf' => ['required', 'string']
        ],
        [
            'nome.required' => 'O campo de nome é obrigatorio!',
            'sexo.required' => 'O campo de sexo é obrigatorio!',
            'data_nascimento.required' => 'O campo de data de nascimento é obrigatorio!',
            'cpf.required' => 'O campo de CPF é obrigatorio!',
        ],
        );
        
        $pessoaUpdate = $pessoa->update([
            'nome' => $request->nome,
            'sexo' => $request->sexo,
            'cidade' => $request->cidade,
            'bairro' => $request->bairro,
            'rua' => $request->rua,
            'complemento' => $request->complemento,
            'data_nascimento' => $request->data_nascimento,
            'cpf' => $request->cpf

        ]);
        
        return redirect()->route('pessoas_exibir_todos', compact('pessoa', 'pessoaUpdate'))->with('success', 'Dados editados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $pessoa = Pessoas::find($id);

        if($pessoa){
            $pessoa->delete();
            return redirect()->route('pessoas_exibir_todos')->with('success', 'Registro excluido com sucesso!');
        }

        return redirect()->back();

        
        
    }
}
