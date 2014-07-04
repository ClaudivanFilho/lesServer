<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReceitaingredienteTable extends Migration {

	public function up()
	{
		Schema::create('receitaingrediente', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('receita_id');
            $table->unsignedInteger('ingrediente_id');
            $table->enum('medida', ['KG', 'G', 'L', 'ML', 'UND']);
            $table->unsignedInteger('quantidade')->default('1');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('receitaingrediente');
	}

}
