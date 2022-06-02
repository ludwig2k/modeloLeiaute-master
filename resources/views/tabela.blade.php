@extends('layouts.master')
@section('title','EXEMPLO')
@section('content')

@if (\Session::has('success'))
<div class="alert alert-success">
<ul>
    <li>{!! \Session::get('success') !!}</li>
</ul>
</div>
@endif


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
                 <th>Ações</th>
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
                        <a href="{{route('pessoas_destroy', $pessoa->id)}}"><button onclick="return confirm('Tem certeza que deseja excluir este registro?')">Delete</button></a>
                        <a href="{{route('pessoas_editar', $pessoa->id)}}"><button >Editar</button></a>
                    </td>
                    
                </tr>
                    
                @endforeach
            </tbody>
        </table>
</div>

<script>
    $(document).ready(function () {
    $('#exemplo').DataTable({
        select: false,
        responsive: true,
        "order": [
            [0, "asc"]
        ],
        "info": false,
        "sLengthMenu": false,
        "bLengthChange": false,
        "oLanguage": {

            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de START até END de TOTAL registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de MAX registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "MENU resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    });
});
</script>


@endsection