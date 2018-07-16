<?php

namespace app\admin\controller;

use think\Request;
use app\admin\model\AuthGroup as AuthGroupModel;
use app\admin\model\AuthRule as AuthRuleModel;
use app\admin\controller\Common;
class AuthGroup extends Common
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $data = AuthGroupModel::all();
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
        $ruleData = AuthRuleModel::getClassData(AuthRuleModel::field('id,pid,title,level')->select());
        $this->assign('ruleData', $ruleData);
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
        if (!empty($data['rules'])) {
            $data['rules'] = implode(',', $data['rules']);
        }
        AuthGroupModel::create($data);
        return $this->redirect(url('index'));
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $ruleData = AuthRuleModel::getClassData(AuthRuleModel::field('id,pid,title,level')->select());
        $data = AuthGroupModel::where('id', $id)->field('title,status,rules')->find();
        if (!empty($data['rules'])) {
            $data['rules'] = explode(',', $data['rules']);
        }
        $this->assign([
            'ruleData' => $ruleData,
            'data' => $data
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
        if (!empty($data['rules'])) {
            $data['rules'] = implode(',', $data['rules']);
        } else {
            $data['rules'] = '';
        }
        AuthGroupModel::where('id', $id)->update($data);
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
        AuthGroupModel::destroy($id);
        return $this->redirect(url('index'));
    }
}
