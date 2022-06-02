@extends('layouts.master')
@section('title','EXEMPLO')
@section('content')
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
            integrity="sha256-Kg2zTcFO9LXOc7IwcBx1YeUBJmekycsnTsq2RuFHSZU=" crossorigin="anonymous"></script>

<form action="{{route('pessoas_update')}}" method="post" class="form-horizontal" id="formProduto">
    @csrf
    <input type="hidden" name="pessoa_id" value="{{$pessoa->id}}">

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
            <h4 class="col-12 modal-title text-center">Novo Cadastro</h5>
        </div>
        <h6 class="col-12 modal-title text-center">Campos com * são obrigatorios</h6>
        <div class="container col-11">
            <input type="hidden" id="id" class="form-control">

            {{--- Formulario Nome ---}}

            <div class="form-group">
                <label for="nome" class="control-label">Nome: *</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="nome" name="nome" value="{{$pessoa->nome}}">
                </div>
            </div>


            <div class="form-group">
                <label for="sexo" class="control-label">Sexo: *</label>
                <div class="input-group">
                    <div class ="col-md-6 w-100" style="display: flex; justify-content: space-between; margin-top: 10px">

                        <div class="">
                            <input type="radio" name="sexo" placeholder="Sexo" value="M"{{ $pessoa->sexo=="M" ? 'checked='.'"'.'checked'.'"' : '' }} required>
                            <label for="sexo">Masculino</label>
                        </div>
                        <div class="">
                            <input type="radio" name="sexo" placeholder="Sexo" value="F"{{ $pessoa->sexo=="F" ? 'checked='.'"'.'checked'.'"' : '' }} required>
                            <label for="sexo">Feminino</label>
                        </div>
                        <div class="">
                            <input type="radio" name="sexo" placeholder="Sexo" value="N"{{ $pessoa->sexo=="N" ? 'checked='.'"'.'checked'.'"' : '' }} required>
                            <label for="sexo">Não-Binário</label>
                        </div>
                        <div class="">
                            <input type="radio" name="sexo" placeholder="Sexo" value="O"{{ $pessoa->sexo=="O" ? 'checked='.'"'.'checked'.'"' : '' }} required>
                            <label for="sexo">Outro</label>
                        </div>
                        </div>
                </div>
            </div>


            <div class="form-group">
                <label for="cidade" class="control-label">Cidade: *</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="cidade" name="cidade"
                    value="{{$pessoa->cidade}}">
                </div>
            </div>

            <div class="form-group">
                <label for="bairro" class="control-label">Bairro: *</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="bairro" name="bairro"
                    value="{{$pessoa->bairro}}">
                </div>
            </div>

            <div class="form-group">
                <label for="rua" class="control-label">Endereço: *</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="rua" name="rua"
                    value="{{$pessoa->rua}}">
                </div>
            </div>

            <div class="form-group">
                <label for="complemento" class="control-label">Complemento: </label>
                <div class="input-group">
                    <input type="text" class="form-control" id="complemento" name="complemento"
                    value="{{$pessoa->complemento}}">
                </div>
            </div>

            <div class="form-group">
                <label for="data_nascimento" class="control-label">Data de nascimento: *</label>
                <div class="input-group">
                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="{{date('Y-m-d',strtotime($pessoa->data_nascimento))}}">
                </div>
            </div>

            <div class="form-group">
                <label for="cpf" class="control-label">CPF: *</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="cpf" name="cpf"
                    value="{{$pessoa->cpf}}">
                </div>
            </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a class="btn btn-secondary" href="#">Cancelar</a>
        </div>
    </div>
</form>
<script> 
    $(document).ready(function(){
        $('#cpf').mask('000.000.000-00', {reverse: true});
        })
</script>
@endsection