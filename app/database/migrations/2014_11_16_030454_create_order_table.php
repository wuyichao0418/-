<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order', function($table){
			$table->increments('order_id');
			$table->integer('order_product_id');
			$table->string('order_product_name');
			$table->integer('order_quantity');
			$table->decimal('order_product_price');
			$table->string('order_address');
			$table->string('order_suburb');
			$table->string('order_postcode');
			$table->string('order_state'); // NSW
			$table->string('customer_email');
			$table->timestamps();
		});

		// Schema::table('order', function($table) {
		// 	$table->foreign('p_id')->references('product_id')->on('product');
		// });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order');
	}

}
