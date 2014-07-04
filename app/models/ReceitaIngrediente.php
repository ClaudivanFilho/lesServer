<?php

class ReceitaIngrediente extends \Eloquent {
	protected $fillable = ['medida', 'quantidade'];
    protected $table = 'receitaingrediente';
    protected $hidden = ['created_at', 'updated_at', 'id', 'receita_id', 'ingrediente_id'];
    public $timestamps = false;

    public function receita() {
        return $this->belongsTo('Receita');
    }

    public function ingrediente() {
        return $this->belongsTo('Ingrediente');
    }
}