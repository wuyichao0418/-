<?php

class IndexController extends BaseController {

	public function __construct() {
		$this->beforeFilter('csrf', array('on' => 'post'));
	}

	public function getIndex() {
		return View::make('shopview.index');
	}

}