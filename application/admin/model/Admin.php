<?php

namespace app\admin\model;

use think\Model;

class Admin extends Model
{
    public static function unlinkImg($fileId)
    {
        $data = self::where('id', $fileId)->field('img')->find();
        unlink($_SERVER['DOCUMENT_ROOT'].$data['img']);
    }
}
