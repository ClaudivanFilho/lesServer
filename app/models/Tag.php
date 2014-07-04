<?php

class Tag extends \Eloquent {
	protected $fillable = ['nome'];
    protected $hidden = ['created_at', 'updated_at', 'id'];

    public function receitas() {
        return $this->hasMany('ReceitaTag')->with('receita');
    }
}