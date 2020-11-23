<?php

# Configuration file for Book Store @vitalii-pokrivchak
# Connection to database @vitalii-pokrivchak
const DB_DRIVER = "mysql";
const DB_HOST = "localhost";
const DB_NAME = "bookstore";
const DB_USER = "root";
const DB_PASSWORD = "root";
const DB_PORT = "3306";


# System Configuration @vitalii-pokrivchak
const DEVELOPMENT_SERVER = "http://localhost:8000";
const APP_NAME = "Jarvis Framework";
const VIEWS_PATH  = "./jarvis/views/";
const TEMPLATES_PATH = "./jarvis/views/templates/";

# Default Settings
const DEFAULT_CONTROLLER = "WelcomeController";
const DEFAULT_ACTION = "index";
const DEFAULT_QUERY_METHOD = "get";
const DEFAULT_VIEW = "MasterView";
# Default namespaces
const ROOT_NAMESPACE = "jarvis\\";
const CONTROLLERS_NAMESPACE = "jarvis\\controllers\\";
const MODELS_NAMESPACE = "jarvis\\models\\";

# 404
const NOT_FOUND_PAGE = "./jarvis/views/404.php";
