<?php

namespace App\Controllers;

abstract class BaseController
{
    public function render_view($view, $data = [])
    {
        extract($data);
        $view = './app/views/' . $view;
        include "./app/views/layout/main.php";
    }
    public function with($key, $value)
    {
        return $_SESSION["$key"] = $value;
    }
    public function unsetSessionMess($key)
    {
        $listArgs =  func_get_args();
        if (count($listArgs) > 1) {
            foreach ($listArgs as  $item) {
                unset($_SESSION["$item"]);
                // var_dump($_SESSION["$item"]);
            }
        } else {
            unset($_SESSION["$key"]);
        }
    }
    public function headerRedirect($url)
    {
        header("location: " . BASE_URL . $url);
    }
}
