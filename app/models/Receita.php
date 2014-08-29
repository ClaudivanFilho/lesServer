<?php

class Receita extends \Eloquent {
    protected $fillable = ['nome',
                           'numPessoas', 'categoria',
                           'tempo', 'infoNutri',
                           'modoPreparo', 'path_img'];
    protected $hidden = ['created_at', 'updated_at'];
    public static $rules = [

    ];

    public function ingredientes() {
        return $this->hasMany('ReceitaIngrediente')->with('ingrediente');
    }

    public function notas() {
        return $this->hasMany('NotaReceita');
    }

    public function tags() {
        return $this->hasMany('ReceitaTag');
    }

    public function ings() {
        if (!is_null($this->ingredientes)) {
            return $this->ingredientes->fetch('ingrediente');
        }
    }

    public function addIng($nome, $medida, $quantidade) {
        $i = Ingrediente::where('nome', '=', strtolower($nome))->first();
        if (is_null($i)) {
            $i = new Ingrediente(['nome' => strtolower($nome)]);
            $i->save();
        }
        $ri = new ReceitaIngrediente([
             'medida'     => $medida,
             'quantidade' => $quantidade
         ]);
        $ri->receita()->associate($this);
        $ri->ingrediente()->associate($i);
        $ri->save();
    }
}