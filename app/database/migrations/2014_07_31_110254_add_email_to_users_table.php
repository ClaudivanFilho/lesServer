<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddEmailToUsersTable extends Migration {

	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->string('email')->nullable();
		});
	}

	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
		    $table->dropColumn('email');
		});
	}

}
