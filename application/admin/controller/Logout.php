<?php
namespace app\admin\controller;
use app\admin\controller\Common;
class Logout extends Common
{
    public function logout()
    {
        session('admin_id', null);
        session('admin_username', null);
        return $this->redirect(url('Login/index'));
    }
}