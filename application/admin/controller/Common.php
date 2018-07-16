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
        $auth = new \org\Auth();
        $name = strtolower(Request::module() . '/' . Request::controller() . '/' . Request::action());
        $notCheck = [
            'admin/index/index'
        ];
        if (!in_array($name, $notCheck)) {
            if (!$auth->check($name, session('admin_id'))) {
                 return $this->error('没有此权限', url('Index/index'));
            }
        }
    }
}