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
    public function submitAdd()
    {
        if (isset($_POST['submitAddForm'])) {
            unsetSessionMess('error_name', 'error_img', 'error_price', 'error_des');
            $flag = true;

            //check Name
            if (empty($_POST['name'])) {
                $flag = false;
                with('error_name', 'Tên sản phẩm không được để trống');
            } elseif (strlen($_POST['name']) < 10) {

                $flag = false;
                with('error_name', 'Tên sản phẩm tối thiểu 10 kí tự');
            } elseif (strlen($_POST['name']) > 30) {
                $flag = false;
                with('error_name', 'Tên sản phẩm tối đa 30 kí tự');
            }

            // check Img
            $imageFileType = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $allowtypes = array('jpg', 'png', 'jpeg', 'gif');
            if (($_FILES['image']['size']) == 0) {
                $flag = false;
                with('error_img', 'Không được để trống ảnh');
            } elseif (($_FILES['image']['size']) > 2000000) {
                $flag = false;
                with('error_img', 'File phải dưới 2M');
            } elseif (!in_array($imageFileType, $allowtypes)) {
                $flag = false;
                with('error_img', 'File tải lên phải là đuôi jpg, png, jpeg, gif');
            }

            //check price

            if (empty($_POST['price'])) {
                $flag = false;
                with('error_price', 'Không được để trống giá');
            } elseif (!is_numeric($_POST['price'])) {
                $flag = false;
                with('error_price', 'Giá phải là số');
            } elseif (($_POST['price']) < 0) {
            }

            //check Description

            if (strlen($_POST['description']) > 25) {

                $flag = false;
                with('error_des', 'Mô tả không quá 250 kí tự');
            }

            if ($flag) {
                $model = new Products;
                $img = $_FILES['image'];

                if ($img['size'] > 0) {
                    $imageValue = uniqid() . '-' . $img['name'];
                    move_uploaded_file($img['tmp_name'], './public/uploads/' . $imageValue);
                    $imageValue =  $imageValue;
                    $model->insert([
                        'name' => $_POST['name'],
                        'image' => $imageValue,
                        'price' => $_POST['price'],
                        'description' => $_POST['description'],
                    ]);
                }
                headerRedirect('products');
            } else {
                headerRedirect('products/add');
            }


            // dd($_FILES);

        }
    }
}
