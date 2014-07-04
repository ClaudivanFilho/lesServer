<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIngredientesTable extends Migration {

	public function up()
	{
		Schema::create('ingredientes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nome');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('ingredientes');
	}

}
