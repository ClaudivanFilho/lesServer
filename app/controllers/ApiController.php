<?php

class ApiController extends \BaseController {

    // no estilo api/receitas?ingredientes=pao,ovo,....
    public function findReceitas() {
        $ingredientes = explode(",", Input::get('ingredientes'));
        $ingredientes = array_map('strtolower', $ingredientes);
        $receitas = Receita::with('ingredientes')->get();
        $retorno = [];
        foreach ($receitas as $rec){
            foreach($rec->ingredientes as $rec_ing) {
                if (in_array($rec_ing->ingrediente->nome, $ingredientes)) {
                    array_push($retorno, $rec);
                    break;
                }
            }
        }
        return Response::json($retorno, 200, [], JSON_PRETTY_PRINT);
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