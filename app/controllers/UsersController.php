<?php

class UsersController extends BaseController {

	public function __construct() {
		$this->beforeFilter('csrf', array('on' => 'post'));
	}

	public function getSignup() {
		return View::make('users.signup');
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), User::$rules);

		if ($validator->passes()) {
			$user = new User;
			$user->username = Input::get('username');
			$user->customer_email = Input::get('customer_email');
			$user->password = Hash::make(Input::get('password'));
			$user->telephone = Input::get('telephone');
			$user->save();

			return Redirect::to('account/signin')
				->with('message', '账号创建');
		}

		return Redirect::to('account/signup')
			->with('message', '请填写合法信息')
			->withErrors($validator)
			->withInput(); // 错误返回的时候默认form里面有User原来填写的数据
	}

	public function getSignin() {
		return View::make('users.signin');
	}

	public function postSignin() {
		if (Input::get('logintype') == 0) {
			Auth::attempt()
		}
		if ( Auth::attempt(array('customer_email'=>Input::get('email'), 'password'=>Input::get('password'))) ) {
			return Redirect::to('/')->with('message', 'Thanks for signin')
				->with('customer_detail', User::all());
		}

		return Redirect::to('account/signin')->with('message', 'Your email/password combo was incorrect');
	}

	public function getSignout() {
		Auth::logout();
		return Redirect::to('account/signin')->with('message', 'User Logout');
	}

	public function getOpenshop() {
		return View::make('users.shopsignup');
	}

	public function postCreateShop() {
		$validator = Validator::make(Input::all(), ShopUser::$rules);

		if ($validator->passes()) {
			$shop_user = new ShopUser;
			$shop_user->shop_name 		= Input::get('shop_name');
			$shop_user->shop_email 		= Input::get('shop_email');
			$shop_user->shop_password 	= Hash::make(Input::get('shop_password'));
			$shop_user->shop_phone 		= Input::get('shop_phone');
			$shop_user->payment_method 	= 'PayPal';
			$shop_user->shop_suburb 	= Input::get('shop_suburb');
			$shop_user->shop_address 	= Input::get('shop_address');
			$shop_user->shop_state	 	= Input::get('shop_state');
			$shop_user->shop_postcode 	= Input::get('shop_postcode');
			$shop_user->shop_hour 		= Input::get('shop_hour');
			$shop_user->save();

			return Redirect::to('account/signin')
				->with('message', '账号创建');
		}

		return Redirect::to('account/openshop')
			->with('message', '请填写合法信息')
			->withErrors($validator)
			->withInput(); // 错误返回的时候默认form里面有User原来填写的数据
	}
}