<?php

ini_set("display_errors", "on");
ini_set("display_startup_errors", "on");

error_reporting(E_ALL);

require_once  __DIR__ . "/app/config/config.php";
require_once __DIR__ . "/vendor/autoload.php";

use app\core\Application;
use app\core\Request;
use app\core\Router;

$request = new Request;
$router = new Router($request);
$app = new Application($router);
