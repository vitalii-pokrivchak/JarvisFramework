<?php

use Jarvis\Router\Route;

Route::GET('/', 'HomeController->index', ['lang', 'id']);
Route::GET('/home', 'HomeController->index', ['lang', 'id']);
