<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotaReceitaTable extends Migration {

	public function up()
	{
		Schema::create('notareceita', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('nota')->default(0);
            $table->integer('receita_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('notareceita');
	}

}
