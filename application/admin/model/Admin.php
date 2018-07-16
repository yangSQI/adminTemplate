<?php

namespace app\admin\model;

use think\Model;

class Admin extends Model
{
    public static function unlinkImg($fileId)
    {
        $data = self::where('id', $fileId)->field('img')->find();
        $file = $_SERVER['DOCUMENT_ROOT'].$data['img'];
        if (is_file($file)) {
            unlink($file);
        }
    }
}
