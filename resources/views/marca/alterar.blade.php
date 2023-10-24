@extends('templateAdmin.index')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Nova marca</h1>

<div class="card">
    <div class="card-header">
        Cadastro
    </div>

    <div class="card-body">
        <form action="/marca/inserir" method="POST">
            <div class="mb-3">
                <input  class="form-control" name="nome" placeholder="Nome da marca">
            </div>

            <div class="mb-3">
                <textarea class="form-control" name="nome_fantasia" rows="3" placeholder="Nome fantasia da marca"></textarea>
            </div>

            <select class="form-control" name="situacao" aria-label="Default select example">
                <option selected>Selecione a situação</option>
                <option value="1" selected>Ativo</option>
                <option value="0" >Inativo</option>
            </select>

            <div class="d-flex justify-content-end">
                <button class="btn btn-success mt-3" type="submit">
                    Cadastrar marca
                    <li class="fa fa-plus ml-2 "></li>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
