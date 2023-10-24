@extends('templateAdmin.index')
@section('content')

    @php
        $titulo = "Inclusão de uma nova marca";
        $btn_titulo = "Cadastrar";
        $endpoint = "/marca/inserir";
        $input_nome = "";
        $input_fantasia = "";
        $input_id = "";

        if (isset($marca)) {
            $titulo = "Alterar marca";
            $endpoint = "/marca/alterar";
            $btn_titulo = "Alterar";
            $input_nome = $marca['nome'];
            $input_fantasia = $marca["nome_fantasia"];
            $input_ativo = $marca["situacao"];
            $input_id = $marca["id"];
        }
    @endphp

    <h1 class="h3 mb-4 text-gray-800"> {{$titulo}}</h1>

    <div class="card">
        <div class="card-header">
            Nova marca
        </div>

        <div class="card-body">
            <form action="{{$endpoint}}" method="POST">
                @CSRF
                <input  value="{{$input_id}}"  name="id" hidden>

                <div class="mb-3">
                    <input  class="form-control" name="nome" placeholder="Nome da marca" value="{{$input_nome}}">
                </div>

                <div class="mb-3">
                    <input  class="form-control" name="nome_fantasia" placeholder="Nome fantasia da marca" value="{{$input_fantasia}}">

                </div>

                <select class="form-control" name="situacao" aria-label="Default select example">
                    <option selected>Selecione a situação</option>
                    <option value="1" selected>Ativo</option>
                    <option value="0" >Inativo</option>
                </select>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-success mt-3" type="submit">
                        {{$btn_titulo}}
                        <li class="fa fa-plus ml-2 "></li>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
