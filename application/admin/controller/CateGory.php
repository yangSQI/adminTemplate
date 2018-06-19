<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\controller\Common;
use app\admin\model\Category as CategoryModel;
class CateGory extends Common
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $data = CategoryModel::getCate();
        $this -> assign('data', $data);
        return $this->fetch();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        $data = CategoryModel::getCate();
        $this -> assign('data', $data);
        return $this->fetch();
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        if ($request -> isPost()) {
            $data = $request -> post();
            CategoryModel::create($data);
            return $this -> redirect(url('index'));
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $data = CategoryModel::get($id);
        $cateData = CategoryModel::getCate();
        foreach ($cateData as $v) {
            if ($data['id'] == $v['id']) {
                $data['level'] = $v['level'];
            }
        }
        $this -> assign([
            'data' => $data,
            'cateData' => $cateData
        ]);
        return $this -> fetch();
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request $request
     * @param  int $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        if ($request -> isPost()) {
            $data = $request -> post();
            CategoryModel::where('id', $id) -> update($data);
            return $this -> redirect(url('index'));
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function delete($id)
    {

    }
}
