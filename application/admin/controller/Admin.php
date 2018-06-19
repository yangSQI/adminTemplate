<?php

namespace app\admin\controller;

use think\Controller;
use app\admin\controller\Common;
use think\Db;
use think\Request;
use app\admin\validate\Admin as AdminValidate;
use app\admin\model\Admin as AdminModel;
class Admin extends Common
{
    public function index()
    {
        $data = Db::name('admin')->field('id,username,img')->paginate(10);
        $total = $data->total();
        $this->assign([
            'data' => $data,
            'total' => $total
        ]);
        return $this->fetch();
    }

    public function edit($id)
    {
        $data = AdminModel::where('id', $id)->field('username,img')->find();
        $this->assign(['data'=>$data]);
        return $this->fetch();
    }

    public function update(Request $request, $id)
    {
        if ($request->isPost()) {
            $data = $request->post();
            $validate = new AdminValidate;
            if ($validate->scene('update')->check($data)) {
                if ($data['password'] == '[[[[[[') {
                    unset($data['password']);
                } else {
                    $data['password'] = md5($data['password']);
                }
                $file = $request->file('img');
                if (!empty($file)) {
                    AdminModel::unlinkImg($id);
                    $imgDir = '/public/static/upload/images';
                    $info = $file->validate(['size'=>1000000,'ext'=>'jpg,png,gif'])->move($_SERVER['DOCUMENT_ROOT'].$imgDir);
                    if ($info) {
                        $data['img'] = $imgDir . '/' . $info->getSaveName();
                        Db::name('admin')->where('id', $id)->update($data);
                        return $this->redirect(url('index'));
                    } else {
                        return $this->error($info->getError());
                    }
                } else {
                    Db::name('admin')->where('id', $id)->update($data);
                    return $this->redirect(url('index'));
                }
            } else {
                return $this->error($validate->getError());
            }
        }
    }

    public function create()
    {
        return $this->fetch();
    }

    public function save(Request $request)
    {
        $data = $request->post();
        $data['password'] = md5($data['password']);
        $validate = new AdminValidate;
        if ($validate->check($data)) {
            $file = $request->file('img');
            if (!empty($file)) {
                $imgDir = '/public/static/upload/images';
                $info = $file->move($_SERVER['DOCUMENT_ROOT'].$imgDir);
                if ($info) {
                    $data['img'] = $imgDir . '/' . $info->getSaveName();
                    db('admin')->insert($data);
                    return $this->redirect(url('index'));
                } else {
                    return $this->error($info->getError());
                }
            } else {
                return $this->error('请上传图片');
            }
        } else {
            return $this->error($validate->getError());
        }
    }
    public function delete($id)
    {
        Db::name('admin')->delete($id);
        return $this->redirect(url('index'));
    }
}
