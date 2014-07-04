<?php

class Tag extends \Eloquent {
	protected $fillable = ['nome'];

    public function receitas() {
        return $this->hasMany('ReceitaTag')->with('receita');
    }
}