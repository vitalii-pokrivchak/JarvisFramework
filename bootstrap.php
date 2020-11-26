<?php

require_once '/vendor/autoload.php';

use jarvis\core\Application;
use jarvis\core\Request;
use jarvis\core\Router;

ini_set('display_errors', 'on');
ini_set('display_startup_errors', 'on');
error_reporting(E_ALL);

$app = new Application(new Router(new Request));
