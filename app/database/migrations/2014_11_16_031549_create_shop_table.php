<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shop', function($table) {
			$table->increments('id');
			$table->string('shop_name');
			$table->string('shop_email')->unquie();
			$table->string('shop_password');
			$table->string('shop_phone');
			$table->integer('shop_rating');
			$table->string('shop_image');
			$table->string('payment_method');
			$table->string('shop_suburb');
			$table->string('shop_address');
			$table->string('shop_state'); // NSW
			$table->string('shop_postcode');
			$table->boolean('shop_hour')->default(0);
			$table->rememberToken();
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
		Schema::drop('shop');
	}

}
