<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Admin as AdminModel;
use think\facade\Session;
use app\admin\controller\Common;
class Login extends Controller
{
    public function index()
    {
        $error = request()->param('error');
        if (!empty($error)) {
            $this->assign('error', $error);
        }
        return $this->fetch();
    }

    public function loginCheck()
    {
        $data = request()->param();
        $data['password'] = md5($data['password']);
        if (captcha_check($data['check'])) {
            $admin = AdminModel::getByUsername($data['username']);
            if (!empty($admin)) {
                if ($admin['password'] == $data['password']) {
                    Session::set('admin_id', $admin['id']);
                    Session::set('admin_username', $admin['username']);
                    return $this->redirect(url('Index/index'));
                } else {
                    return $this->error('密码错误');
                }
            } else {
                return $this->error('该管理员不存在');
            }
        } else {
            return $this->error('验证码错误');
        }
    }
}