<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class ShopUser extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'shop';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

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

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
	    return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
	    return $this->shop_password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
	    return $this->shop_email;
	}

	// Add your other methods here

}