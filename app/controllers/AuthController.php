<?php

namespace App\Controllers;

use App\Models\Users;
// use App\Controllers\BaseController;

class AuthController extends BaseController
{
    public function formLogin()
    {
        // check login by remember acc
        if (!isset($_SESSION['auth']) && isset($_COOKIE['token_login'])) {
            $userLoginToken = Users::where(['token', '=', $_COOKIE['token_login']])->first();

            if (time() < $userLoginToken->expires_time) {
                $_SESSION['auth'] = [
                    'username' => $userLoginToken->username,
                    'email' => $userLoginToken->email,
                ];

                $this->headerRedirect('home');
            }
        }

        $this->unsetSessionMess('error_email', 'error_pass', 'error_auth');
        $this->render_view('auth/login.php', ['title' => 'Đăng nhập']);
        $this->unsetSessionMess('notAuth');
    }
    public function submitLogin()
    {
        $flag = true;
        $this->unsetSessionMess('error_email', 'error_pass', 'error_auth');
        if (isset($_POST['submitFormLogin'])) {

            $userLogin = Users::where(['email', '=', $_POST['email']])->first();
            // dd($userLogin->email);
            if (empty($_POST['email']) || $_POST['email'] === null) {
                $flag = false;
                $this->with('error_email', 'Không được để trống email');
            } elseif (!$userLogin) {
                $flag = false;
                $this->with('error_auth', 'Thông tin đăng nhập chưa chính xác');
            }

            if (empty($_POST['password']) || $_POST['password'] === null) {
                $flag = false;
                $this->with('error_pass', 'Mật khẩu không được để trống');
            } elseif ($userLogin && !password_verify($_POST['password'], $userLogin->password)) {
                $flag = false;
                $this->with('error_auth', 'Thông tin đăng nhập chưa chính xác');
            }

            if ($flag) {
                if (isset($_POST['remember']) && $_POST['remember'] !== null) {
                    // setcookie('email', $userLogin->email, time() + 86400);
                    // setcookie('password', $_POST['password'], time() + 86400);
                    $bytes = random_bytes(20);
                    $token = bin2hex($bytes);

                    setcookie('token_login', $token, time() + 86400);
                    $userLogin->update([
                        'token' => $token,
                        'expires_time' => time() + 86400,
                    ]);
                }
                $_SESSION['auth'] = [
                    'username' => $userLogin->username,
                    'email' => $userLogin->email,
                    // 'name'=>$userLogin->username,
                ];
                $this->headerRedirect('home');
            }
        }
        return $this->$this->render_view('auth/login.php', ['title' => 'Đăng nhập']);
    }
    public function registerForm()
    {
        $this->unsetSessionMess('error_email', 'error_pass', 'error_repass', 'success', 'error_username');

        return $this->render_view('auth/register.php', ['title' => 'Đăng kí']);
    }
    public function submitRegister()
    {
        $flag = true;
        $this->unsetSessionMess('error_email', 'error_pass', 'error_repass', 'error_username');
        if (isset($_POST['submitFormRegister'])) {

            $model = new Users;

            //check Username
            if (empty($_POST['username']) || $_POST['username'] === null) {
                $flag = false;
                $this->with('error_username', 'Không được để trống username');
            } elseif (strlen($_POST['username']) < 5) {
                $flag = false;
                $this->with('error_username', 'Tên đăng nhập phải lớn hơn 5 ký tự');
            } elseif (strlen($_POST['username']) > 50) {
                $flag = false;
                $this->with('error_username', 'Tên đăng nhập không vượt quá 50 ký tự');
            }

            //check Email
            if (empty($_POST['email']) || $_POST['email'] === null) {
                $flag = false;
                $this->with('error_email', 'Không được để trống email');
            } elseif (!preg_match("/^([\w])+([\w\._-])*@([\w_-])+\.[A-Za-z]{2,6}$/", $_POST['email'])) {
                $flag = false;
                $this->with('error_email', 'Email không hợp lệ');
            } else {
                $checkEmailExist =  $model::where(['email', '=', $_POST['email']])->first();
                if ($checkEmailExist) {
                    $flag = false;
                    $this->with('error_email', 'Email đã tồi tại');
                }
            }

            //check pass
            if (empty($_POST['password']) || $_POST['password'] === null) {
                $flag = false;
                $this->with('error_pass', 'Không được để trống mật khẩu');
            } elseif (strlen($_POST['password']) < 8) {
                $flag = false;
                $this->with('error_pass', 'Mật khẩu tối thiểu 8 kí tự');
            }

            //check repass
            if (empty($_POST['repassword']) || $_POST['repassword'] === null) {
                $flag = false;
                $this->with('error_repass', 'Không được để trống mật khẩu');
            } elseif ($_POST['password'] !== $_POST['repassword']) {
                $flag = false;
                $this->with('error_repass', 'Mật khẩu nhập lại không khớp');
            }
            if ($flag) {
                $_POST['username'] = htmlspecialchars($_POST['username']);
                $_POST['email'] = htmlspecialchars($_POST['email']);
                $_POST['password'] = htmlspecialchars($_POST['password']);
                $model->insert([
                    'username' => $_POST['username'],
                    'email' => $_POST['email'],
                    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                ]);
                $this->with('success', "Đăng kí thành công! Tự động chuyển hướng sau 3s");
                header("refresh:3;url=" . BASE_URL . 'login');
            }
            $this->render_view('auth/register.php', ['title' => 'Đăng kí']);
        }
    }
    public function logout()
    {
        setcookie('token_login', '', time() - 86400);
        session_destroy();
        $this->headerRedirect('home');
    }
}
