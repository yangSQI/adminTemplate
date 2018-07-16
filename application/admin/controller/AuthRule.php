<?php

namespace app\admin\controller;
use app\admin\controller\Common;
use think\Controller;
use think\Request;
use app\admin\model\AuthRule as AuthRuleModel;
use app\admin\model\AuthGroup as AuthGroupModel;
class AuthRule extends Common
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $data = AuthRuleModel::getClassData(AuthRuleModel::field('id,title,name,level,pid')->select());
        $this->assign('data', $data);
        return $this->fetch();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        $data = AuthRuleModel::getClassData(AuthRuleModel::field('id,pid,title,level')->select());
        $this->assign('data', $data);
        return $this->fetch();
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        if (!$request->isPost()) { return false; }
        $data = $request->post();
        if ($data['pid'] != 0) {
            $data['level'] = AuthRuleModel::where('id', $data['pid'])->value('level') + 1;
        }
        AuthRuleModel::create($data);
        return $this->redirect(url('index'));
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $data = AuthRuleModel::where('id', $id)->field('name,title,pid,level')->find();
        $classData = AuthRuleModel::getClassData(AuthRuleModel::field('id,pid,title,level')->select());
        $this->assign([
            'data' => $data,
            'classData' => $classData
        ]);
        return $this->fetch();
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        if (!$request->isPost()) { return false; }
        $data = $request->post();
        if ($data['pid'] != 0) {
            $data['level'] = AuthRuleModel::where('id', $data['pid'])->value('level') + 1;
        } else {
            $data['level'] = 0;
        }
        AuthRuleModel::setLevel($id, $data['level']);
        AuthRuleModel::where('id', $id)->update($data);
        return $this->redirect(url('index'));
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        $data = AuthRuleModel::getDelData($id);
        AuthGroupModel::delGroupRule($data);
        AuthRuleModel::destroy($data);
        return $this->redirect(url('index'));
    }
}
