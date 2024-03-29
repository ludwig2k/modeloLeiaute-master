<!DOCTYPE html>
<html>

<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="utf-8">
    <title>PDF EXEMPLO</title>
</head>
<style>
    .table-condensed {
        font-size: 13px;
    }

    div {
        margin-top: 10px;
    }
</style>

<body>
    <header>
        <div align="center">
            <img width="100" src="{{public_path('imagens/logo.png')}}"
                style="width:100px;height:120px;float: left;z-index:10000" />
            <center>
                <h4 style="margin-top: 30px">Prefeitura Municipal de São Leopoldo<br /></h4>
                <h4>Secretária Municipal de Desenvolvimento Social</h4>
                <h4>Nome Sistema</h4>
        </div>
    </header>
    <div align="center">
        <h4 style="margin-top: 50px"><strong></strong><br /></h4>
    </div>
    <table class="table">
        <thead align="center">
            <tr>
                <th>Nome</th>
                <th>Sexo</th>
                <th>Cidade</th>
                <th>Bairro</th>
                <th>Rua</th>
                <th>Complemento</th>
                <th>Data de Nascimento</th>
                <th>CPF</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pessoas as $pessoa)
            <tr>
                <td>{{$pessoa->nome}}</td>
                <td>{{$pessoa->sexo}}</td>
                <td>{{$pessoa->cidade}}</td>
                <td>{{$pessoa->bairro}}</td>
                <td>{{$pessoa->rua}}</td>
                <td>{{$pessoa->complemento}}</td>
                <td>{{$pessoa->data_nascimento}}</td>
                <td>{{$pessoa->cpf}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>