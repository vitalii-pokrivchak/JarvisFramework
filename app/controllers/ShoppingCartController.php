<?php

namespace app\controllers;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $view = "ShoppingCartView";
        $title = APP_NAME . ' - ' . 'Shopping Cart';
        require_once VIEWS_PATH . "MasterView.php";
    }
}
