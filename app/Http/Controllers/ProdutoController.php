<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Marca;

class ProdutoController extends Controller {
    public function index() {
        $produtos = Produto::select(
            'produto.id',
            'produto.nome',
            'produto.preco',
            'produto.quantidade',
            'produto.descricao',
            'categorias.nome as categoriaNome',
            'marca.nome as marcaNome'
        )
        ->join('categorias', 'categorias.id', '=', 'produto.id_categoria')
        ->join('marca', 'marca.id', '=', 'produto.id_marca')
        ->get();

        return view("produto.index", [
            'produtos' => $produtos
        ]);


    }

    public function inserir() {
        $categorias = Categoria::all()->toArray();
        $marcas = Marca::all()->toArray();

        return view("produto.formulario", [
            'categorias' => $categorias,
            'marcas' => $marcas
        ]);
    }

    public function salvar_novo(Request $request) {
        $produto = new Produto;
        $produto->nome = $request->input("nome");
        $produto->id_marca = $request->input("marca");
        $produto->id_categoria = $request->input("categoria");
        $produto->quantidade = $request->input("quantidade");
        $produto->preco = $request->input("preco");
        $produto->descricao = $request->input("descricao");
        $produto->save();

        return redirect("/produto");
    }

    public function excluir($id) {
        $produto = Produto::find($id);
        $produto->delete();

        return redirect("/produto");
    }

    public function alterar($id) {
        $produto = Produto::find($id)->toArray();
        $categorias = Categoria::all()->toArray();
        $marcas = Marca::all()->toArray();

        return view("produto.formulario", [
            'produtos' => $produto,
            'categorias' => $categorias,
            'marcas' => $marcas
        ]);
    }

    public function salvar_alterar(Request $request) {
        $input_id = $request->input("id");

        $produto = Produto::find($input_id);

        $produto->nome = $request->input("nome");
        $produto->id_marca = $request->input("marca");
        $produto->id_categoria = $request->input("categoria");
        $produto->quantidade = $request->input("quantidade");
        $produto->preco = $request->input("preco");
        $produto->descricao = $request->input("descricao");

        $produto->save();

        return redirect("/produto");
        exit;
    }
}
