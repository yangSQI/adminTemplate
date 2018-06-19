<?php

namespace app\admin\model;

use think\Model;

class Article extends Model
{
    public static function unlinkImg($fileId)
    {
        $data = self::where('id', $fileId)->field('img,imgDir')->find();
        unlink($_SERVER['DOCUMENT_ROOT'] . $data['imgDir'] . '/' . $data['img']);
    }

}
