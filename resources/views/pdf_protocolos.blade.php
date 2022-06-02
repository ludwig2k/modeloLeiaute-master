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
                <th>Atendente</th>
                    <th>Descrição</th>
                    <th>Data</th>
                     <th>Prazo</th>
                     <th>Receptor</th>
                </thead>
                <tbody>
                    @foreach ($protocolos as $protocolo )
                    <tr> 
                        <td>{{$protocolo->getAtendente->nome}}</td>
                        <td>{{$protocolo->descricao}}</td>
                        <td>{{date('d-m-Y',strtotime($protocolo->data))}}</td>
                        <td>{{$protocolo->prazo}}</td>
                        <td>{{$protocolo->getReceptor->nome}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>