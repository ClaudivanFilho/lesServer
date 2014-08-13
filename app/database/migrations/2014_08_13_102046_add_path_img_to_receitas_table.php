<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddPathImgToReceitasTable extends Migration {

	public function up()
	{
		Schema::table('receitas', function(Blueprint $table)
		{
			$table->string('path_img')->nullable();
		});
	}

	public function down()
	{
		Schema::table('receitas', function(Blueprint $table)
		{
		    $table->dropColumn('path_img');
		});
	}

}
