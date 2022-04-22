<form action="{{route('pessoas_store')}}" method="post" class="form-horizontal" id="formProduto">
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
            <h4 class="col-12 modal-title text-center">Novo Cadastro</h5>
        </div>
        <h6 class="col-12 modal-title text-center">Campos com * são obrigatorios</h6>
        <div class="container col-11">
            <input type="hidden" id="id" class="form-control">

            {{--- Formulario Nome ---}}

            <div class="form-group">
                <label for="nome" class="control-label">Nome: *</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo">
                </div>
            </div>


            <div class="form-group">
                <label for="sexo" class="control-label">Sexo: *</label>
                <div class="input-group">
                    <div class ="col-md-6 w-100" style="display: flex; justify-content: space-between; margin-top: 10px">

                        <div class="">
                            <input type="radio" name="sexo" placeholder="Sexo" value="M" required>
                            <label for="sexo">Masculino</label>
                        </div>
                        <div class="">
                            <input type="radio" name="sexo" placeholder="Sexo" value="F" required>
                            <label for="sexo">Feminino</label>
                        </div>
                        <div class="">
                            <input type="radio" name="sexo" placeholder="Sexo" value="N" required>
                            <label for="sexo">Não-Binário</label>
                        </div>
                        <div class="">
                            <input type="radio" name="sexo" placeholder="Sexo" value="O" required>
                            <label for="sexo">Outro</label>
                        </div>
                        </div>
                </div>
            </div>


            <div class="form-group">
                <label for="cidade" class="control-label">Cidade: *</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="cidade" name="cidade"
                        placeholder="Ex: São Leopoldo">
                </div>
            </div>

            <div class="form-group">
                <label for="bairro" class="control-label">Bairro: *</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="bairro" name="bairro"
                        placeholder="Ex: Centro">
                </div>
            </div>

            <div class="form-group">
                <label for="rua" class="control-label">Endereço: *</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="rua" name="rua"
                        placeholder="Ex: Av. Dom João Becker, 754">
                </div>
            </div>

            <div class="form-group">
                <label for="complemento" class="control-label">Complemento: </label>
                <div class="input-group">
                    <input type="text" class="form-control" id="complemento" name="complemento"
                        placeholder="Ex: Apartamento 123B">
                </div>
            </div>

            <div class="form-group">
                <label for="data_nascimento" class="control-label">Data de nascimento: *</label>
                <div class="input-group">
                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
                </div>
            </div>

            <div class="form-group">
                <label for="cpf" class="control-label">CPF: *</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="cpf" name="cpf"
                        placeholder="Ex: 000.000.000-00">
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