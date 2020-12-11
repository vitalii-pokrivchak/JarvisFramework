<?php

require_once 'vendor/autoload.php';
require_once 'App/Config/Routes.php';

use Jarvis\Core\Application;
use Jarvis\Router\Router;

ini_set('display_errors', 'on');
ini_set('display_startup_errors', 'on');
error_reporting(E_ALL);

$app = Application::getInstance();
