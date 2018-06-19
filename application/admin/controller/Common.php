<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Request;
use think\facade\Session;
class Common extends Controller
{
    public function initialize()
    {
        if (empty(Session::get('admin_id')) || empty(Session::get('admin_username'))) {
            return $this->redirect(url('Login/index'));
        }
    }
}