<form action="{{route('protocolos_store')}}" method="post" class="form-horizontal" id="formProduto">
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
            <h4 class="col-12 modal-title text-center">Novo Protocolo</h5>
        </div>
        <h6 class="col-12 modal-title text-center">Campos com * são obrigatorios</h6>
        <div class="container col-11">
            <input type="hidden" id="id" class="form-control">

            <div class="form-group">
                <label for="descricao" class="control-label">Descrição: *</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Ex: Problema no setor 2">
                </div>
            </div>


            <div class="form-group">
                <label for="data" class="control-label">Data: *</label>
                <div class="input-group">
                    <input type="date" class="form-control" id="data" name="data">
                </div>
            </div>

            <div class="form-group">
                <label for="prazo" class="control-label">Prazo(Dias): *</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="prazo" name="prazo" placeholder="Ex: 3, 10">
                </div>
            </div>

            <div class="form-group">
                <label>Selecione o receptor</label>
                <select name="pessoa" id="pessoa">
                @foreach ( $pessoas as $pessoa)
                
                <option value="{{$pessoa->id}}">{{$pessoa->nome }}</option>
                    
                @endforeach
            </select> 
            </div>


        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a class="btn btn-secondary" href="#">Cancelar</a>
        </div>
    </div>
</form>