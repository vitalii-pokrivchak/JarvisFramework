<?php

require_once 'vendor/autoload.php';

use jarvis\core\Application;
use jarvis\core\ConfigurationManager;

ini_set('display_errors', 'on');
ini_set('display_startup_errors', 'on');
error_reporting(E_ALL);

$app = Application::getInstance();
