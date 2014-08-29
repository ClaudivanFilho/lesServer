<?php

class NotaReceita extends \Eloquent {
	protected $fillable = ['nota'];

    public function receita() {
        return $this->belongsTo('Receita');
    }
}