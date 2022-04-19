<?php

namespace App\Controllers;

use App\Models\Users;

class AuthController
{
    public function formLogin()
    {
        unsetSessionMess('error_email', 'error_pass');
        return render_view('auth/login.php', ['title' => 'Đăng nhập']);
    }
    public function submitLogin()
    {
        $flag = true;
        unsetSessionMess('error_email', 'error_pass');
        if (isset($_POST['submitFormLogin'])) {

            $userLogin = Users::where(['email', '=', $_POST['email']])->first();
            // dd($userLogin->email);
            if (empty($_POST['email']) || $_POST['email'] === null) {
                $flag = false;
                with('error_email', 'Không được để trống email');
            } elseif (!$userLogin) {
                $flag = false;
                with('error_email', 'Email không tồn tại');
            }

            if (empty($_POST['password']) || $_POST['password'] === null) {
                $flag = false;
                with('error_pass', 'Mật khẩu không được để trống');
            } elseif ($userLogin && !password_verify($_POST['password'], $userLogin->password)) {
                $flag = false;
                with('error_pass', 'Mật khẩu không đúng');
            }

            if ($flag) {
                if (isset($_POST['remember']) && $_POST['remember'] !== null) {
                    setcookie('email', $userLogin->email, time() + 86400);
                    setcookie('password', $_POST['password'], time() + 86400);
                }

                $_SESSION['auth'] = [
                    'username' => $userLogin->username,
                    'email' => $userLogin->email,
                    // 'name'=>$userLogin->username,
                ];
                headerRedirect('home');
            }
        }
        return render_view('auth/login.php', ['title' => 'Đăng nhập']);
    }
    public function registerForm()
    {
        unsetSessionMess('error_email', 'error_pass', 'error_repass', 'success', 'error_username');

        return render_view('auth/register.php', ['title' => 'Đăng kí']);
    }
    public function submitRegister()
    {
        $flag = true;
        unsetSessionMess('error_email', 'error_pass', 'error_repass');
        if (isset($_POST['submitFormRegister'])) {

            $model = new Users;

            //check Username
            if (empty($_POST['username']) || $_POST['username'] === null) {
                $flag = false;
                with('error_username', 'Không được để trống username');
            } elseif (strlen($_POST['username']) < 5) {
                $flag = false;
                with('error_username', 'Tên đăng nhập phải lớn hơn 5 ký tự');
            } elseif (strlen($_POST['username']) > 50) {
                $flag = false;
                with('error_username', 'Tên đăng nhập không vượt quá 50 ký tự');
            }

            //check Email
            if (empty($_POST['email']) || $_POST['email'] === null) {
                $flag = false;
                with('error_email', 'Không được để trống email');
            } elseif (!preg_match("/^([\w])+([\w\._-])*@([\w_-])+\.[A-Za-z]{2,6}$/", $_POST['email'])) {
                $flag = false;
                with('error_email', 'Email không hợp lệ');
            } else {
                $checkEmailExist =  $model::where(['email', '=', $_POST['email']])->first();
                if ($checkEmailExist) {
                    $flag = false;
                    with('error_email', 'Email đã tồi tại');
                }
            }

            //check pass
            if (empty($_POST['password']) || $_POST['password'] === null) {
                $flag = false;
                with('error_pass', 'Không được để trống mật khẩu');
            } elseif (strlen($_POST['password']) < 8) {
                $flag = false;
                with('error_pass', 'Mật khẩu tối thiểu 8 kí tự');
            }

            //check repass
            if (empty($_POST['repassword']) || $_POST['repassword'] === null) {
                $flag = false;
                with('error_repass', 'Không được để trống mật khẩu');
            } elseif ($_POST['password'] !== $_POST['repassword']) {
                $flag = false;
                with('error_repass', 'Mật khẩu nhập lại không khớp');
            }
            if ($flag) {
                $model->insert([
                    'username' => $_POST['username'],
                    'email' => $_POST['email'],
                    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                ]);
                with('success', "Đăng kí thành công! Tự động chuyển hướng sau 3s");
                header("refresh:3;url=" . BASE_URL . 'login');
            }
            render_view('auth/register.php', ['title' => 'Đăng kí']);
        }
    }
    public function logout()
    {
        unset($_SESSION['auth']);
        headerRedirect('home');
    }
}
