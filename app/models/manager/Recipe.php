<?php
/**
 * Created by PhpStorm.
 * User: Claudivan
 * Date: 14/07/14
 * Time: 12:59
 */

class Recipe {

    public static function cria($nome, $nota=5, $numPessoas=2,
                                $categoria='LANCHE',$tempo=1, $infoNutri='indisponivel',
                                $modoPreparo='indisponivel'){
        $rec = new Receita([
                               'nome'        => $nome,
                               'nota'        => $nota,
                               'numPessoas'  => $numPessoas,
                               'categoria'   => $categoria,
                               'tempo'       => $tempo,
                               'infoNutri'   => $infoNutri,
                               'modoPreparo' => $modoPreparo
                           ]);
        $rec->save();
        return $rec;
    }

    public static function saveTags(array $tags, Receita $rec) {
        foreach ($tags as $tag) {
            $t = Tag::where('nome', '=', $tag)->first();
            if (is_null($t)) {
                $t = new Tag(['nome' => $tag]);
                $t->save();
            }
            $rt = new ReceitaTag();
            $rt->receita()->associate($rec);
            $rt->tag()->associate($t);
            $rt->save();
        }
    }

} 