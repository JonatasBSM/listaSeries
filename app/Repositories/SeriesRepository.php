<?php
namespace App\Repositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Serie;



class SeriesRepository {

    public function add(Request $request): Serie{
        DB::beginTransaction();
        try {
            $serie = Serie::create($request->all());
            for ($i = 1; $i <= ($request->Temporadas); $i++) {
                $season = $serie->seasons()->create([
                    "number" => $i      
                ]);
                
                for ($j = 1; $j <= ($request->Episodios); $j++) {
                    $season->episodes()->create([
                        "number" => $j
                    ]);
             
                }
            }
            $request->session()->flash("mensagem.sucesso", "Série {$serie->nome} armazenada com sucesso");

        } catch (Exception $e) {
            $request->session()->flash("mensagem.falha", "Não foi possível armazenar a série {$serie->nome}");
        }
        DB::commit();
        DB::rollBack();
        return $serie;
    }

    public function delete(Serie $series, Request $request): void {
        try {
            Serie::destroy($series->id);
            $request->session()->flash("mensagem.sucesso", "Série {$series->nome} removida com sucesso");

        }catch (Exception $e) {
            $request->session()->flash("mensagem.falha", "Série {$series->nome} não pode ser removida");
        }
    }
}