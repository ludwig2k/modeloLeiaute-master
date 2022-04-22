@extends('layouts.master')
@section('title','EXEMPLO')
@section('content')

<div class="container-fluid no-padding table-responsive-sm">
    <table class="table table-striped nowrap" style="width:100%" id="exemplo">
            <thead>  
             <th>Nome</th>
                <th>Sexo</th>
                 <th>Cidade</th>
                 <th>Bairro</th>
                 <th>Rua</th>
                 <th>Complemento</th>
                 <th>Data de Nasc</th>
                 <th>CPF</th>
            </thead>
            <tbody>
                @foreach ($pessoas as $pessoa )
                <tr> 
                    <td>{{$pessoa->nome}}</td>
                    <td>{{$pessoa->sexo}}</td>
                    <td>{{$pessoa->cidade}}</td>
                    <td>{{$pessoa->bairro}}</td>
                    <td>{{$pessoa->rua}}</td>
                    <td>{{$pessoa->complemento}}</td>
                    <td>{{date('d-m-Y',strtotime($pessoa->data_nascimento))}}</td>
                    <td>{{$pessoa->cpf}}</td>
                    <td>
                    </td>
                    
                </tr>
                    
                @endforeach
            </tbody>
        </table>
</div>


@endsection