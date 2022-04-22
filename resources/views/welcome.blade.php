@extends('layouts.master')
@section('title','EXEMPLO')
@section('content')

<div class="conteudo">
    <div class="row d-flex justify-content-around">
        <div class="col-sm-3">
            <div class="card text-center">
                <img class="card-img-top" src="{{ URL::to('/imagens/images.png') }}" alt="">
                <div class="card-body">
                    <h4 class="card-title">Cadastro Exemplo</h4>
                    <p class="card-text"></p>
                    <a href="{{ route('cadastro') }}" class="btn btn-primary stretched-link">Link cadastro</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-center">
                <img class="card-img-top" src="{{ URL::to('/imagens/images.png') }}" alt="">
                <div class="card-body">
                    <h4 class="card-title">Lista Exemplo</h4>
                    <p class="card-text"></p>
                    <a href="{{ route('lista') }}" class="btn btn-primary stretched-link">Link lista</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-center">
                <img class="card-img-top" src="{{ URL::to('/imagens/images.png') }}" alt="">
                <div class="card-body">
                    <h4 class="card-title">PDF Exemplo</h4>
                    <p class="card-text"></p>
                    <a href="{{ route('pdf') }}" class="btn btn-primary stretched-link">Link lista</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection