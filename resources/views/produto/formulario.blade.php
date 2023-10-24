@extends('templateAdmin.index')
@section('content')

    @php
        $titulo = "Inclusão de um novo produto";
        $btn_titulo = "Cadastrar";
        $endpoint = "/produto/inserir";
        $input_nome = "";
        $input_id = "";
        $input_preco = "";
        $input_quantidade = "";
        $input_descricao = "";
        $input_marca_id = "";
        $input_marca_nome = "";
        $input_categoria = "";

        if (isset($produtos) and isset($marcas) and isset($categorias)) {
            $titulo = "Alterar produto";
            $endpoint = "/produto/alterar";
            $btn_titulo = "Alterar";
            $input_nome = $produtos['nome'];
            $input_id = $produtos["id"];
            $input_preco = $produtos["preco"];
            $input_quantidade = $produtos["quantidade"];
            $input_descricao = $produtos["descricao"];
            $input_categoria = $produtos["id_categoria"];
            $input_marca_id = $produtos["id_marca"];

            foreach ($marcas as $marca) {
                if ($marca['id'] == $input_marca_id) {
                    $input_marca_nome = $marca['nome'];
                }
            }

        }
        // echo $marca['id'];
        echo $input_marca_id;

    @endphp

    <h1 class="h3 mb-4 text-gray-800"> {{$titulo}}</h1>

    <div class="card">
        <div class="card-header">
            Novo produto
        </div>

        <div class="card-body">
            <form action="{{$endpoint}}" method="POST">
                @CSRF
                <input  value="{{$input_id}}"  name="id" hidden>

                <div class="mb-3">
                    <input  class="form-control" name="nome" placeholder="Nome do produto" value="{{$input_nome}}">
                </div>

                <div class="mb-3">
                    <input  class="form-control" name="preco" placeholder="Preço" value="{{$input_preco}}">
                </div>

                <div class="mb-3">
                    <input  class="form-control" name="quantidade" placeholder="Quantidade" value="{{$input_quantidade}}">
                </div>

                <div class="mb-3">
                    <input  class="form-control" name="descricao" placeholder="Descrição" value="{{$input_descricao}}">
                </div>

                <select class="form-control mt-3" name="marca" aria-label="Default select example">
                    @foreach ($marcas as $marca)
                    <?php
                    if ($marca['id'] == $input_marca_id) {
                        echo "<option value=" . $marca['id'] . " selected>" . $marca['nome'] . "</option>";
                    } else {
                        echo "<option value=" . $marca['id'] . ">" . $marca['nome'] . "</option>";
                    }
                    ?>

                    @endforeach

                </select>

                <select class="form-control mt-3" name="categoria" aria-label="Default select example">
                    <option selected value="0">Selecione a categoria</option>
                    @foreach ($categorias as $categoria)
                    <option  value={{$categoria['id']}}>{{$categoria['nome']}}</option>

                    @endforeach

                </select>

                @csrf
                <textarea name="teste" id="teste" class="ckeditor"></textarea>
                {{-- <select class="form-control mt-3" name="situacao" aria-label="Default select example">
                    <option selected>Selecione a situação</option>
                    <option value="1" selected>Ativo</option>
                    <option value="0" >Inativo</option>
                </select> --}}


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
