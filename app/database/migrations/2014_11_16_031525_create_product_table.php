<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product', function($table){
			$table->increments('product_id');
			$table->string('product_name');
			$table->string('product_description');
			$table->decimal('product_price', 6, 2);
			$table->boolean('product_available')->default(1);
			$table->integer('category_id');
			$table->string('shop_email');
			$table->string('product_image');
			$table->timestamps();
		});

		// Schema::table('product', function($table){
		// 	$table->foreign('c_id')->references('category_id')->on('category');
		// });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product');
	}

}
