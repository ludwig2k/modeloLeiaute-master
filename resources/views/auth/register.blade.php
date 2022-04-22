@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Criar Conta') }}</div>
        <div class="form">
            <form method="POST" action="{{ route('cadastro_store') }}">
                @csrf
                <div class="input">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Nome">

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror

                    <input type="string" name="cpf_cad" id="cpf_cad" class="form-control @error('cpf') is-invalid @enderror"
                        placeholder="CPF" maxlength="14" data-mask="000.000.000-00">

                    @error('cpf')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password" placeholder="Senha">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        autocomplete="new-password" placeholder="Confirmar senha">

                    <button type="submit">
                        {{ __('Registrar') }}
                    </button>
                </div>
                <div class="details">
                    <p class="register text-center">Já possui conta? <a href="/login">Entrar</a></p>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">{{ __('Criar Conta') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group row">

            <div class="col-md-8">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Nome">

                @error('name')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">

            <div class="col-md-8">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" autocomplete="email" placeholder="Email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-8">
                <input type="string" name="cpf" id="cpf" class="form-control @error('cpf') is-invalid @enderror"
                    placeholder="CPF" maxlength="14" data-mask="000.000.000-00">

                @error('cpf')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">

            <div class="col-md-8">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" autocomplete="new-password" placeholder="Senha">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">

            <div class="col-md-8">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                    autocomplete="new-password" placeholder="Confirmar senha">
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8">
                <button type="submit" class="btn-hover btn btn-primary">
                    {{ __('Registrar') }}
                </button>

                <p class="register text-center">Já possui conta? <a href="/login">Entrar</a></p>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div> --}}
@endsection
