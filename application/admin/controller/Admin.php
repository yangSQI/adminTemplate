<?php

namespace app\admin\controller;

use think\Controller;
use app\admin\controller\Common;
use think\Db;
use think\Request;
use app\admin\validate\Admin as AdminValidate;
use app\admin\model\Admin as AdminModel;
use app\admin\model\AuthGroup as AuthGroupModel;
use app\admin\model\AuthGroupAccess as AccessModel;
class Admin extends Common
{
    public function index()
    {
        $data = Db::table('blog_admin')->alias('admin')->leftJoin('auth_group_access access', 'admin.id=access.uid')->leftJoin('auth_group group', 'access.group_id=group.id')->field('admin.id,admin.username,admin.img,group.title')->paginate(10);
        $total = $data->total();
        $this->assign([
            'data' => $data,
            'total' => $total
        ]);
        return $this->fetch();
    }

    public function edit($id)
    {
        $data = Db::table('blog_admin')->alias('admin')->leftJoin('auth_group_access access', 'admin.id=access.uid')->leftJoin('auth_group group', 'access.group_id=group.id')->field('admin.username,admin.img,access.group_id,group.title')->where('admin.id', $id)->find();
        $groupData = AuthGroupModel::where('status', 1)->field('id,title')->select();
        $this->assign([
            'groupData' => $groupData,
            'data' => $data
        ]);
        return $this->fetch();
    }

    public function update(Request $request, $id)
    {
        if ($request->isPost()) {
            $data = $request->post();
            $groupId = $data['group_id'];
            unset($data['group_id']);
            $validate = new AdminValidate;
            if ($validate->scene('update')->check($data)) {
                if ($data['password'] == '********') {
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
                        if (!empty($groupId)) {
                            if (empty(AccessModel::getByUid($id))) {
                                db::name('auth_group_access')->insert([
                                    'uid' => $id,
                                    'group_id' => $groupId
                                ]);
                            } else {
                                AccessModel::where('uid', $id)->update(['group_id'=>$groupId]);
                            }
                        }
                        return $this->redirect(url('index'));
                    } else {
                        return $this->error($info->getError());
                    }
                } else {
                    Db::name('admin')->where('id', $id)->update($data);
                    if (!empty($groupId)) {
                        if (empty(AccessModel::getByUid($id))) {
                            db::name('auth_group_access')->insert([
                                'uid' => $id,
                                'group_id' => $groupId
                            ]);
                        } else {
                            AccessModel::where('uid', $id)->update(['group_id'=>$groupId]);
                        }
                    }
                    return $this->redirect(url('index'));
                }
            } else {
                return $this->error($validate->getError());
            }
        }
    }

    public function create()
    {
        $data = AuthGroupModel::where('status', 1)->field('id,title')->select();
        $this->assign('data', $data);
        return $this->fetch();
    }

    public function save(Request $request)
    {
        if (!$request->isPost()) { return false; }
        $data = $request->post();
        $groupId = $data['group_id'];
        unset($data['group_id']);
        $data['password'] = md5($data['password']);
        $validate = new AdminValidate;
        if ($validate->check($data)) {
            $file = $request->file('img');
            if (!empty($file)) {
                $imgDir = '/public/static/upload/images';
                $info = $file->move($_SERVER['DOCUMENT_ROOT'].$imgDir);
                if ($info) {
                    $data['img'] = $imgDir . '/' . $info->getSaveName();
                    $uid = db('admin')->insertGetId($data);
                    if (!empty($groupId)) {
                        db::name('auth_group_access')->insert([
                            'uid' => $uid,
                            'group_id' => $groupId
                        ]);
                    }
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
