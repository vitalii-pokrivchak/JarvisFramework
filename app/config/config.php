<?php

# Configuration file for Book Store @vitalii-pokrivchak
# Connection to database @vitalii-pokrivchak
const DB_HOST = "h56.hvosting.ua";
const DB_NAME = "bookstore";
const DB_USER = "bookstoreuser";
const DB_PASSWORD = "r4HdqtqO";
const DB_PORT = "3260";


# System Configuration @vitalii-pokrivchak
const DEVELOPMENT_SERVER = "http://localhost:8000";
const APP_NAME = "BookStore";
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
