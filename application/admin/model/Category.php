<?php
namespace app\admin\model;

use think\Model;

class Category extends Model
{
    public static function getCate()
    {
        $data = self::cateSort(self::all());
        return $data;
    }

    public static function cateSort($data, $upid = 0, $level = 0)
    {
        static $cateData = [];
        foreach ($data as $v) {
            if ($v['upid'] == $upid) {
                $v['level'] = $level;
                $cateData[] = $v;
                self::cateSort($data, $v['id'], $level + 1);
            }
        }
        return $cateData;
    }

}