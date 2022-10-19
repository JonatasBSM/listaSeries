<?php

namespace App\Http\Controllers;
use App\Models\Serie;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\Stmt\TryCatch;
use App\Repositories\SeriesRepository;

class SeriesController extends Controller
{

    public function __construct(SeriesRepository $repository)
    {  
        $this->repository = $repository;
    }

    public function index(Request $request) {

        //pega valores da tabela Serie ordenando pelo nome
        $series = Serie::all();
        

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
            "nome" => ["required","min:3"],
            "Temporadas" => "required",
            "Episodios" => "required"
        ]);

        $serie = $this->repository->add($request);

        return redirect("/series");
    }

    public function edit(Serie $series) {
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
        $this->repository->delete($series, $request);
        return redirect("/series");
    }
}
