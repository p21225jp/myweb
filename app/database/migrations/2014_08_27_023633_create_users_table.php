<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
	    {
	        $table->increments('id');
	        $table->string('username',255)->unique();
	        $table->string('password',60);
	        $table->string('remember_token', 100);
		    $table->string('true_name',25)->null();
			$table->string('accounts',18)->null();
			$table->string('phone',11)->null();
			$table->string('e_mail',25)->null();
	        $table->timestamps();
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
