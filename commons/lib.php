<?php
function dd($data)
{
    echo "<pre>";
    var_dump($data);
    die;
}
function render_view($view, $data = [])
{
    extract($data);
    $view = './app/views/' . $view;
    include "./app/views/layout/main.php";
}
