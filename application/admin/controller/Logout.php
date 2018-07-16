<?php
namespace app\admin\controller;
use think\Controller;
class Logout extends Controller
{
    public function logout()
    {
        session('admin_id', null);
        session('admin_username', null);
        return $this->redirect(url('Login/index'));
    }
}