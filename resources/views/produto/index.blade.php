@extends('templateAdmin.index')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h2> produtos</h2>

        <a href="produto/inserir" class="btn btn-success py-1">
            Novo produto
            <li class="fa fa-plus ml-2"></li>
        </a>
    </div>
    <div class="card">
        <div class="card-body">

            <table class="table table-bordered dataTable">
                <thead>
                    <td>ID</td>
                    <td >Nome</td>
                    <td>Categoria</td>
                    <td>Marca</td>
                    <td>Quantidade</td>
                    <td>Preço</td>
                    <td>Descrição</td>
                    <td>Opções</td>
                </thead>

                <tbody>
                    @foreach ($produtos as $linha)
                        <tr>
                            <td>{{$linha['id']}}</td>
                            <td>{{$linha['nome']}}</td>
                            <td>{{$linha['categoriaNome']}}</td>
                            <td>{{$linha['marcaNome']}}</td>
                            <td>{{$linha['quantidade']}}</td>
                            <td>R$ {{$linha['preco']}}</td>
                            <td>{{$linha['descricao']}}</td>
                            {{-- <td>{{$linha['situacao'] == 1 ? "Ativo" : "Inativo"}}</td> --}}
                            <td>
                                <a href="/produto/alterar/{{$linha['id']}}" class="btn-success  px-4 rounded-sm"> <li class="fa fa-edit fa-sm"></li></a>
                                <a href="/produto/excluir/{{$linha['id']}}" class="btn-danger  px-4 rounded-sm ml-1 "> <li class="fa fa-trash fa-sm"></li></a>
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
