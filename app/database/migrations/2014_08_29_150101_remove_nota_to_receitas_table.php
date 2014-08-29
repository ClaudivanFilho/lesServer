<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class RemoveNotaToReceitasTable extends Migration {

	public function up()
	{
		Schema::table('receitas', function(Blueprint $table)
		{
			$table->dropColumn('nota');
		});
	}

	public function down()
	{
		Schema::table('receitas', function(Blueprint $table)
		{
			//
		});
	}

}
