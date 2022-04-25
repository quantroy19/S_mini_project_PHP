<?php

namespace App\Controllers;

use App\Models\Products;

class HomeController extends BaseController
{
    public function index()
    {
        $list_pro = Products::all();
        // dd($list_pro);
        $title = 'Danh sách sản phẩm';
        return $this->render_view('home/home.php', [
            'title' => $title,
            'products' => $list_pro
        ]);
    }
}
