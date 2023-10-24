<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class MarcaController extends Controller {
    public function index() {
        $dados = Marca::all()->toArray();
        return view("marca.index", [
            'marcas' => $dados
        ]);
    }

    public function inserir() {
        return view("marca.formulario");
    }

    public function salvar_novo(Request $request) {
        $marca = new Marca;
        $marca->nome = $request->input("nome");
        $marca->nome_fantasia = $request->input("nome_fantasia");
        $marca->situacao = $request->input("situacao");
        $marca->save();

        return redirect("/marca");
    }

    public function excluir($id) {
        $marca = Marca::find($id);
        $marca->delete();

        return redirect("/marca");
    }

    public function alterar($id) {
        $marca = Marca::find($id)->toArray();
        return view("marca.formulario", ['marca' => $marca]);
    }

    public function salvar_alterar(Request $request) {
        $input_id = $request->input("id");

        $marca = Marca::find($input_id);

        $marca->nome = $request->input("nome");
        $marca->nome_fantasia = $request->input("nome_fantasia");
        $marca->situacao = $request->input("situacao");

            $marca->save();

        return redirect("/marca");
        exit;
    }
}
