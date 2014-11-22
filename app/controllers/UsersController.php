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
		$validator = Validator::make( 
			array('logintype' => Input::get('logintype')),
			array('logintype' => array('required')) 
		);

		if ($validator->passes()) {
			if (Input::get('logintype') == 0) {
				if ( Auth::customer()->attempt(array('customer_email'=>Input::get('email'), 'password'=>Input::get('password'))) ) {
					return Redirect::to('/')->with('message', 'Thanks for signin')
						->with('customer_detail', User::all());
				} else {
					return Redirect::to('account/signin')->with('message', 'Your email/password combo was incorrect');
				}
			} else {
				if ( Auth::shopuser()->attempt(array('shop_email'=>Input::get('email'), 'password'=>Input::get('password'))) ) {
					return Redirect::to('account/shop-profile')->with('message', 'Thanks for signin')
						->with('customer_detail', ShopUser::all());
				} else {
					return Redirect::to('account/signin')->with('message', 'Your email/password combo was incorrect');
				}
			}
		}

		return Redirect::to('account/signin')
				->with('message', '请选择登录类型')
				->withErrors($validator);
	}

	public function getUserSignout() {
		Auth::customer()->logout();
		return Redirect::to('account/signin')->with('message', 'User Logout');
	}

	/**
	 * 
	 *	商店管理开始
	 *  
	 */
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

			$image = Input::file('shop_image');  // 处理图片 得到上传图片
			// $filename = date('Y-m-d-H:i:s')."-".$image->getClientOriginalName(); // 排除同名字图片
			$filename = time()."-".$image->getClientOriginalName(); // 排除同名字图片
			
			// $path = public_path('img/products/'.$filename);
			$path = public_path('img/'.Input::get('shop_name').'/' . $filename);
			Image::make($image->getRealPath())->resize(468, 249)->save($path);

			$shop_user->shop_image = 'img/'.Input::get('shop_name').'/'.$filename; // 显示图片读取db url

			$shop_user->save();

			return Redirect::to('account/signin')
				->with('message', '账号创建');
		}

		return Redirect::to('account/openshop')
			->with('message', '请填写合法信息')
			->withErrors($validator)
			->withInput(); // 错误返回的时候默认form里面有User原来填写的数据
	}

	/**
	 * 
	 *	商店登出
	 *  
	 */
	public function getShopSignout() {
		Auth::shopuser()->logout();
		return Redirect::to('account/signin')->with('message', 'User Logout');
	}

	/**
	 * 
	 *	商店个人资料页面
	 *  
	 */
	public function getShopProfile() {
		return View::make('users.shoprofile')
			->with('shopusers', ShopUser::find(Auth::shopuser()->user()->id));
	}

	public function postProfileUpdate() {
		$validator = Validator::make(
			Input::all(), 
			array());


	}
}