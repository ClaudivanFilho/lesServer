<?php

class ReceitaTag extends \Eloquent {
	protected $fillable = [];
    protected $table = 'receitatag';
    protected $hidden = ['created_at', 'updated_at', 'id', 'receita_id', 'tag_id'];

    public function receita() {
        return $this->belongsTo('Receita');
    }

    public function tag() {
        return $this->belongsTo('Tag');
    }
}