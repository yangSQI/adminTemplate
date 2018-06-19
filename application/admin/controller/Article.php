<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\Category as CategoryModel;
use app\admin\validate\Article as ArticleValidate;
use app\admin\model\Article as ArticleModel;
use app\admin\controller\Common;
class Article extends Common
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $data = db('article')->alias('a')->join('admin', 'a.aid=admin.id')->join('category c', 'a.cid=c.id')->field('a.id,a.title,a.writeTime,a.keywords,a.count,a.imgDir,a.img,admin.username,c.cate_name')->paginate(10);
        $this->assign(['data' => $data]);
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
        $this->assign(['data' => $data]);
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
        if ($request->isPost()) {
            $data = $request->post();
            $data['keywords'] = strtolower($data['keywords']);
            $validate = new ArticleValidate;
            if (!$validate->check($data)) {
                return $this->error($validate->getError());
            }
            $writeTime = $_SERVER['REQUEST_TIME'];
            $data['writeTime'] = $writeTime;

            $data['aid'] = session('admin_id');
            $file = $request->file('thumb');
            $imgDir = '/public/static/upload/images';
            $info = $file->validate(['size' => 1000000, 'ext' => 'jpg,png,gif,jpeg'])->move($_SERVER['DOCUMENT_ROOT'] . $imgDir);
            if ($info) {
                $data['imgDir'] = $imgDir . '/' . substr($info->getSaveName(), 0, strpos(str_replace('\\', DIRECTORY_SEPARATOR, $info->getSaveName()), DIRECTORY_SEPARATOR));
                $data['img'] = $info->getFilename();
                db('article')->insert($data);
                return $this->redirect(url('index'));
            } else {
                return $this->error($file->getError());
            }
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
        $cateData = CategoryModel::getCate();
        $data = db('article')->where('id', $id)->field('title,keywords,des,content,cid,img,imgDir')->find();
        $this->assign([
            'data' => $data,
            'cateData' => $cateData
        ]);


        return $this->fetch();
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
        if ($request->isPost()) {
            $validate = new ArticleValidate;
            $data = $request->post();
            if ($validate->check($data)) {
                $file = $request->file('thumb');
                $writeTime = $_SERVER['REQUEST_TIME'];
                $data['writeTime'] = $writeTime;
                if (empty($file)) {
                    ArticleModel::where('id', $id)->update($data);
                    return $this->redirect(url('index'));
                } else {
                    ArticleModel::unlinkImg($id);
                    $imgDir = '/public/static/upload/images';
                    $info = $file->move($_SERVER['DOCUMENT_ROOT'].$imgDir);
                    if ($info) {
                        $data['imgDir'] = $imgDir . '/' . substr($info->getSaveName(), 0, strpos(str_replace('\\', DIRECTORY_SEPARATOR, $info->getSaveName()), DIRECTORY_SEPARATOR));
                        $data['img'] = $info->getFilename();
                        ArticleModel::where('id', $id)->update($data);
                        return $this->redirect(url('index'));
                    } else {
                        return $this->error($info->getError());
                    }
                }
            } else {
                return $this->error($validate->getError());
            }
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
        ArticleModel::unlinkImg($id);
        ArticleModel::destroy($id);
        return $this->redirect(url('index'));
    }
}
