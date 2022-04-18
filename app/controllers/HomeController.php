<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        $data = 'quanquan';
        return render_view('home/home.php', ['data2' => $data]);
    }
}
