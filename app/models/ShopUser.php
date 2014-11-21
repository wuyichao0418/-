<?php

class ShopUser extends Eloquent {

	protected $table = 'shop';

	protected $fillable = array(
		'shop_name', 'shop_email', 'shop_password', 'shop_phone',
		'shop_image', 'payment_method', 'shop_suburb', 'shop_address',
		'shop_state', 'shop_postcode', 'shop_hour');

	public static $rules = array(
		'shop_name'				=>	'required|min:2|alpha',
		'shop_email'			=>	'required|email|unique:shop',
		'shop_password' 				=>	'required|alpha_num|confirmed',
		'shop_password_confirmation'	=>	'required|alpha_num',
		'shop_phone' 			=>	'required|between:8,15|unique:shop',
		'shop_image'			=>	'',
		'payment_method'		=> 	'',
		'shop_suburb'			=>	'required|alpha',
		'shop_address'			=>	'required',
		'shop_state'			=>	'required',
		'shop_postcode'			=>	'required|between:4,4',
		'shop_hour'				=>	'required|integer'
	);
}