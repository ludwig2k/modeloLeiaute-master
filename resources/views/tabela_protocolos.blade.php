@extends('layouts.master')
@section('title','EXEMPLO')
@section('content')

<div class="container-fluid no-padding table-responsive-sm">
    <table class="table table-striped nowrap" style="width:100%" id="exemplo">
                <thead>  
                 <th>Atendente</th>
                    <th>Descrição</th>
                    <th>Data</th>
                     <th>Prazo</th>
                     <th>Receptor</th>
                     <th>Ações</th>
                </thead>
                <tbody>
                    @foreach ($protocolos as $protocolo )
                    <tr> 
                        <td>{{$protocolo->getAtendente->nome}}</td>
                        <td>{{$protocolo->descricao}}</td>
                        <td>{{date('d-m-Y',strtotime($protocolo->data))}}</td>
                        <td>{{$protocolo->prazo}}</td>
                        <td>{{$protocolo->getReceptor->nome}}</td>
                        <td> 
                        </td>
                    </tr>
                        
                    @endforeach
                </tbody>
            </table>
</div>


@endsection