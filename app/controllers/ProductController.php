<?php

namespace App\Controllers;

use App\Models\Products;

class ProductController
{
    public function index()
    {
        $title = 'Danh sách sản phẩm';
        $products = Products::all();
        return render_view('products/list_product.php', ['listProduct' => $products, 'title' => $title]);
    }
    public function add()
    {
        $title = 'Thêm sản phẩm';
        return render_view('products/add.php', ['title' => $title]);
    }
}
