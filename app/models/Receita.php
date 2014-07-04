<?php

class Receita extends \Eloquent {
    protected $fillable = ['nome', 'nota',
                           'numPessoas', 'categoria',
                           'tempo', 'infoNutri',
                           'modoPreparo'];
    protected $hidden = ['created_at', 'updated_at', 'id'];

    public function ingredientes() {
        return $this->hasMany('ReceitaIngrediente')->with('ingrediente');
    }

    public function tags() {
        return $this->hasMany('ReceitaTag')->with('tag');
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