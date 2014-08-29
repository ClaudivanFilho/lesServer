<?php

class ApiController extends \BaseController {

    // no estilo api/receitas?ingredientes=pao,ovo,....
    public function findReceitas() {
        $ingredientes = explode(",", Input::get('ingredientes'));
        $map_de_receitas = [];
        $map_nome_receita = [];

        $ingredientes = array_map('strtolower', $ingredientes);
        $ingredientes = Ingrediente::with('receitas','receitas.receita.ingredientes')->whereIn('nome', $ingredientes)->get();
        foreach ($ingredientes as $ing) {
            foreach ($ing->receitas as $receita_ing) {
                $nome = $receita_ing->receita->nome;
                $map_nome_receita = array_merge($map_nome_receita, [$nome => $receita_ing->receita]);
                if (array_key_exists($nome, $map_de_receitas)) {
                    $map_de_receitas[$nome] = $map_de_receitas[$nome] + 1;
                } else {
                    $map_de_receitas = array_merge($map_de_receitas, [$nome => 1]);
                }
            }
        }

        arsort($map_de_receitas); // ordena pelos valores
        $arr_receitas_ordenado = [];
        // add as colecoes a um array baseado nos nomes do mapa
        foreach (array_keys($map_de_receitas) as $nome_receita) {
            array_push($arr_receitas_ordenado, $map_nome_receita[$nome_receita]);
        }

        return Response::json($arr_receitas_ordenado, 200, [], JSON_PRETTY_PRINT);
	}

    public function findRestritas() {
        $ingredientes = explode(",", Input::get('ingredientes'));
        $ingredientes = array_map('strtolower', $ingredientes);
        $receitas_result = [];
        $receitas = Receita::with('ingredientes')->get();
        foreach ($receitas as $rec){
            $array_ings = [];
            foreach ($rec->ingredientes as $rec_ing) {
                array_push($array_ings, $rec_ing->ingrediente->nome);
            }
            if ($array_ings == $ingredientes ) {
                array_push($receitas_result, $rec);
            }
        }
        return Response::json($receitas_result, 200, [], JSON_PRETTY_PRINT);
    }

}