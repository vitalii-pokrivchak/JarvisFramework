<?php

namespace app\controllers;

use jarvis\core\Bundle;
use jarvis\controllers\Controller;
use jarvis\config\Config;

class HomeController extends Controller
{
	private Bundle $bundle;
	public function __construct()
	{
		$this->bundle = new Bundle((string)Config::GetAppSettingByKey('app_name'), 'HomeView');
	}
	public function index()
	{
		parent::render($this->bundle);
	}
}
