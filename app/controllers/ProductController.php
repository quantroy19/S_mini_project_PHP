<?php

namespace App\Controllers;

class ProductController
{
    public function index()
    {
        return render_view('products/list_product.php');
    }
}
