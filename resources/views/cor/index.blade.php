@extends('templateAdmin.index')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h2> Cores</h2>

        <a href="cor/inserir" class="btn btn-success py-1">
            Nova cor
            <li class="fa fa-plus ml-2"></li>
        </a>
    </div>
    <div class="card">
        <div class="card-body">

            <table class="table table-bordered dataTable">
                <thead>
                    <td>ID</td>
                    <td class="col-6">Nome</td>
                    <td>Situação</td>
                    <td>Opções</td>
                </thead>

                <tbody>
                    @foreach ($cores as $linha)
                        <tr>
                            <td>{{$linha['id']}}</td>
                            <td>{{$linha['nome']}}</td>
                            <td>{{$linha['situacao'] == 1 ? "Ativo" : "Inativo"}}</td>
                            <td>
                                <a href="/cor/alterar/{{$linha['id']}}" class="btn-success  px-4 rounded-sm"> <li class="fa fa-edit fa-sm"></li></a>
                                <a href="/cor/excluir/{{$linha['id']}}" class="btn-danger  px-4 rounded-sm ml-1 "> <li class="fa fa-trash fa-sm"></li></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@php
@endphp

@endsection
