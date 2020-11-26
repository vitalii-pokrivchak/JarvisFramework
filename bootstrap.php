<?php

require_once './framework/config/config.php';
require_once 'vendor/autoload.php';

use jarvis\core\Application;
use jarvis\core\Request;
use jarvis\core\Router;

ini_set('display_errors', 'on');
ini_set('display_startup_errors', 'on');
error_reporting(E_ALL);


$request = new Request;
$router = new Router($request);
$app = new Application($router);
