<?php
class AuthController
{
    public function index()
    {
        return render_view('auth/login.php');
    }
}
