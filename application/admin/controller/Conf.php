<?php

namespace app\admin\controller;
use app\admin\controller\Common;
use think\Controller;
use think\Request;
use app\admin\validate\Conf as ConfValidate;

class Conf extends Common
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $data = db('conf')->field('id,cnname,enname,type,sort')->order('sort desc')->select();
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
        $validate = new ConfValidate;
        if ($validate->check($data)) {
            if (!empty($data['value_s'])) {
                $data['value_s'] = str_replace('，', ',', $data['value_s']);
            }
            db('conf')->insert($data);
            return $this->redirect(url('index'));
        } else {
            return $this->error($validate->getError());
        }
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $data = db('conf')->where('id', $id)->field('cnname,enname,type,value_s')->find();
        $this->assign('data', $data);
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
        if (!empty($data['value_s'])) {
            $data['value_s'] = str_replace('，', ',', $data['value_s']);
        }
        db('conf')->where('id', $id)->update($data);
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
        db('conf')->delete($id);
        return $this->redirect(url('index'));
    }
    public function conf()
    {
        $data = db('conf')->field('cnname,enname,type,value,value_s')->order('sort desc')->select();
        foreach ($data as &$v) {
            if (!empty($v['value_s'])) {
                $v['value_s'] = explode(',', $v['value_s']);
                $newArr = [];
                foreach ($v['value_s'] as $value) {
                    $arr = explode('/', $value);
                    $newArr[$arr[0]] = $arr[1];
                }
                $v['value_s'] = $newArr;
            }
        }
        $this->assign('data', $data);
        return $this->fetch();
    }
    public function setConf(Request $request)
    {
        if (!$request->isPost()) { return false; }
        $data = $request->post();
        foreach ($data as $k => $v) {
            db('conf')->where('enname', $k)->update(['value' => $v]);
        }
        return $this->redirect(url('conf'));
    }
    public function sort(Request $request)
    {
        if (!$request->isPost()) { return false; }
        $data = $request -> post();
        foreach ($data as $k => $v) {
            db('conf')->where('id', $k)->update(['sort' => $v]);
        }
        return $this->redirect(url('index'));
    }
}
