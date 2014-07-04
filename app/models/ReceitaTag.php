<?php

class ReceitaTag extends \Eloquent {
	protected $fillable = [];
    protected $table = 'receitatag';

    public function receita() {
        return $this->belongsTo('Receita');
    }

    public function tag() {
        return $this->belongsTo('Tag');
    }
}