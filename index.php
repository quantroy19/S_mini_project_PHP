<?php
require 'vendor/autoload.php';


session_start();
ob_start();
require "./commons/lib.php";
require "./commons/utils.php";

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\ProductController;

$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : "/";

switch ($url) {
    case '/':
        $ctr = new HomeController();
        $ctr->index();
        break;
    case 'home':
        $ctr = new HomeController();
        $ctr->index();
        break;
    case 'login':
        $ctr = new AuthController();
        $ctr->formLogin();
        break;
    case 'submit-login':
        $ctr = new AuthController();
        $ctr->submitLogin();
        break;
    case 'register':
        $ctr = new AuthController();
        $ctr->registerForm();
        break;
    case 'submit-register':
        $ctr = new AuthController();
        $ctr->submitRegister();
        break;
    case 'logout':
        $ctr = new AuthController();
        $ctr->logout();
        break;
    case 'products':
        $ctr = new ProductController();
        $ctr->index();
        break;
    case 'products/add':
        $ctr = new ProductController();
        $ctr->add();
        break;
    case 'products/submit-add-form':
        $ctr = new ProductController();
        $ctr->submitAdd();
        break;
    case 'products/edit':
        $ctr = new ProductController();
        $ctr->edit();
        break;
    case 'products/submit-edit-form':
        $ctr = new ProductController();
        $ctr->submitEdit();
        break;
    case 'products/remove':
        $ctr = new ProductController();
        $ctr->remove();
        break;
    default:
        require './app/views/404.php';
        break;
}
