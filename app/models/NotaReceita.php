<?php

class NotaReceita extends \Eloquent {
	protected $fillable = ['nota'];
    protected $table = "NotaReceita";
    protected $hidden = ['id', 'receita_id', 'created_at','updated_at'];
    public function receita() {
        return $this->belongsTo('Receita');
    }
}