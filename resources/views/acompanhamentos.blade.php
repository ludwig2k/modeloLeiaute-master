@extends('layouts.master')
@section('title','EXEMPLO')
@section('content')

<form action="{{route('acomp_store')}}" method="post" class="form-horizontal" id="formProduto" enctype="multipart/form-data">
    @csrf

    @if (\Session::has('success'))
        <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
        </div>
        @endif

        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach


    <div class="card">
        <div class="card-header">
            <h4 class="col-12 modal-title text-center">Novo Acompanhamento</h5>
        </div>
        <h6 class="col-12 modal-title text-center">Campos com * são obrigatorios</h6>
        <div class="container col-11">
            <input type="hidden" id="id" class="form-control">

            <div class="form-group">
                <label for="observacao" class="control-label">Observação: *</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="observacao" name="observacao" placeholder="Ex: Foram feitas mudanças; Foram encontrados bugs.">
                </div>
            </div>


            <div class="form-group">
                <label for="data" class="control-label">Data: *</label>
                <div class="input-group">
                    <input type="date" class="form-control" id="data1" name="data1">
                </div>
            </div>


            <div class="form-group">
                <label>Selecione o protocolo</label>
                <select name="protocolo_id1" id="protocolo_id1">
                @foreach ( $protocolos as $protocolo)
                
                <option value="{{$protocolo->id}}">{{$protocolo->descricao }}</option>
                    
                @endforeach
            </select> 
            </div>

            
</div>


        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a class="btn btn-secondary" href="#">Cancelar</a>
        </div>
    </div>
</form>

@endsection