<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('category', function($table){
			$table->increments('category_id');
			$table->string('category_name');
			$table->string('shop_email');
			$table->timestamps();
		});

		// Schema::table('category', function($table){
		// 	$table->foreign('s_email')->references()->on('shop');
		// });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('category');
	}

}
