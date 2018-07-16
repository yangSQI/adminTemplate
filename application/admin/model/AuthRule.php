<?php

namespace app\admin\model;

use think\Model;

class AuthRule extends Model
{
    public static function getClassData($data, $pid = '0')
    {
        static $arr = [];
        foreach ($data as $v) {
            if ($v['pid'] == $pid) {
                $arr[] = $v;
                self::getClassData($data, $v['id']);
            }
        }
        return $arr;
    }
    public static function setLevel($id, $level)
    {
        $data = self::where('pid', $id)->field('id,level')->select();
        foreach ($data as $v) {
            $v['level'] = $level + 1;
            self::where('id', $v['id'])->update(['level'=>$v['level']]);
            self::setLevel($v['id'], $v['level']);
        }
    }
    public static function getDelData($id)
    {
        static $arr = [];
        $arr[] = $id;
        $data = self::where('pid', $id)->column('id');
        foreach ($data as $v) {
            self::getDelData($v);
        }
        return $arr;
    }
}
