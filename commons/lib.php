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
function redirect($url)
{
    header('location:' . BASE_URL . $url);
    die;
}
function with($key, $value)
{
    return $_SESSION["$key"] = $value;
}
function unsetSessionMess($key)
{
    $listArgs =  func_get_args();
    if (count($listArgs) > 1) {
        foreach ($listArgs as  $item) {
            unset($_SESSION["$item"]);
            // var_dump($_SESSION["$item"]);
        }
    }
}
function headerRedirect($url)
{
    header("location: " . BASE_URL . $url);
}
