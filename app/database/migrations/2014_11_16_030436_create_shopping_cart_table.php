<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingCartTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cart', function($table){
			$table->increments('id');
			$table->integer('product_id');
			$table->string('product_name');
			$table->decimal('product_price', 6, 2); // 999.99
			$table->integer('product_quantity');
			$table->string('shop_name');
			$table->string('customer_email');
			$table->timestamps();
		});

		// Schema::table('cart', function($table){
		// 	$table->foreign('user_email')->references('email')->on('customer');
		// });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cart');
	}

}
