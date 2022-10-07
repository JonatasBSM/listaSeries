<?php

namespace App\Http\Controllers;
use App\Models\Serie;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\Stmt\TryCatch;

class SeriesController extends Controller
{
    public function index(Request $request) {

        //pega valores da tabela Serie ordenando pelo nome
        $series = Serie::query()->orderBy("nome")->get();

        //pega mensagem sucesso/derrota através da session e depois esquece ela
        $mensagemSucesso = session("mensagem.sucesso");

        return view("series.index", ['series' => $series, "mensagemSucesso" => $mensagemSucesso]);
    }

    public function create(Request $request) {
        return view("series.create");
    }

    public function store(Request $request) {


        //Validação
        $request->validate([
            "nome" => ["required","min:3"]
        ]);

        //salva nome da serie na tabela Serie


        //Maneira de preencher vários campos em uma linha só
        try {
            $serie = Serie::create(["nome" => $request->input("nome")]);
            $request->session()->flash("mensagem.sucesso", "Série {$serie->nome} armazenada com sucesso");

        } catch (Exception $e) {
            $request->session()->flash("mensagem.falha", "Não foi possível armazenar a série {$serie->nome}");
        }

    

        return redirect("/series");
    }

    public function edit(Serie $series) {
        dd($series->temporadas);
        return view ("series.edit", ["serie" => $series]);
    }

    public function update(Serie $series, Request $request) {

        $request->validate([
            "nome" => ["required","min:3"]
        ]);

        $series->nome = $request->input("nome");
        $series->save();
        return redirect("/series");
    }

    public function destroy(Serie $series, Request $request) {

        //mensagem de sucesso/falha através de sessões
        try {
            Serie::destroy($series->id);
            $request->session()->flash("mensagem.sucesso", "Série {$series->nome} removida com sucesso");

        }catch (Exception $e) {
            $request->session()->flash("mensagem.falha", "Série {$series->nome} não pode ser removida");
        }
        return redirect("/series");
    }
}
