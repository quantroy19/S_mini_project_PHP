<?php
session_start();
ob_start();
require "./commons/lib.php";
require "./commons/utils.php";
require "./app/controllers/HomeController.php";
require "./app/controllers/AuthController.php";

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
        $ctr->index();
        break;

    default:
        # code...
        break;
}
