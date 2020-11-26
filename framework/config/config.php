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
const VIEWS_PATH  = "./app/views/";
const TEMPLATES_PATH = "./app/views/templates/";

# Default Settings
const DEFAULT_CONTROLLER = "HomeController";
const DEFAULT_ACTION = "index";
const DEFAULT_QUERY_METHOD = "get";
const DEFAULT_VIEW = "MasterView";
# Default namespaces
const ROOT_NAMESPACE = "app\\";
const CONTROLLERS_NAMESPACE = "app\\controllers\\";
const MODELS_NAMESPACE = "app\\models\\";

# 404
const NOT_FOUND_PAGE = "./app/views/404.php";
