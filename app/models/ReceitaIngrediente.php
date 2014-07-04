<?php

class ReceitaIngrediente extends \Eloquent {
	protected $fillable = ['medida', 'quantidade'];
    protected $table = 'receitaingrediente';
    public $timestamps = false;

    public function receita() {
        return $this->belongsTo('Receita');
    }

    public function ingrediente() {
        return $this->belongsTo('Ingrediente');
    }
}