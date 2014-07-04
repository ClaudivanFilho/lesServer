<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReceitasTable extends Migration {

	public function up()
	{
		Schema::create('receitas', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('nome');
            $table->integer('nota')->default('0');
            $table->unsignedInteger('numPessoas')->default('0');
            $table->string('categoria')->default('LANCHE');
            $table->float('tempo')->default('0.5');
            $table->string('infoNutri')->default('indisponível');
            $table->string('modoPreparo')->default('indisponível');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('receitas');
	}

}
