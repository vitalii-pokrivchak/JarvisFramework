<?php

namespace App\Controllers;

use Jarvis\Core\Bundle;
use Jarvis\Controllers\Controller;
use Jarvis\Config\Config;

class HomeController extends Controller
{
	private Bundle $bundle;
	public function __construct()
	{
		$this->bundle = new Bundle((string)Config::GetAppSettingByKey('App_Name'), 'HomeView');
	}
	public function index()
	{
		parent::render($this->bundle);
	}
}
