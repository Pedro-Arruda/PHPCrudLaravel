<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller {
    public function index() {
        $dados = Categoria::all()->toArray();
        return view("categoria.index", [
            'categorias' => $dados
        ]);
    }

    public function inserir() {
        return view("categoria.formulario");
    }

    public function salvar_novo(Request $request) {
        $categoria = new Categoria;
        $categoria->nome = $request->input("nome");
        $categoria->situacao = $request->input("situacao");
        $categoria->save();

        return redirect("/categoria");
    }

    public function excluir($id) {
        $categoria = Categoria::find($id);
        $categoria->delete();

        return redirect("/categoria");
    }

    public function alterar($id) {
        $categoria = Categoria::find($id)->toArray();
        return view("categoria.formulario", ['categoria' => $categoria]);
    }

    public function salvar_alterar(Request $request) {
        $input_id = $request->input("id");

        $categoria = Categoria::find($input_id);

        $categoria->nome = $request->input("nome");
        $categoria->situacao = $request->input("situacao");

        $categoria->save();

        return redirect("/categoria");
        exit;
    }
}
