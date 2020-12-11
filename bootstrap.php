<?php

require_once 'vendor/autoload.php';

use Jarvis\Core\Application;
use Jarvis\Router\Helpers\ContentType;
use Jarvis\Router\Response;

ini_set('display_errors', 'on');
ini_set('display_startup_errors', 'on');
error_reporting(E_ALL);

$app = Application::getInstance();
