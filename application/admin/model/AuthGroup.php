<?php

namespace app\admin\model;

use think\Model;

class AuthGroup extends Model
{
    public static function delGroupRule($ruleArr)
    {
        $data = self::field('id,rules')->select();
        $arr = [];
        foreach ($data as $k => $v) {
            $v['rules'] = explode(',', $v['rules']);
            $arr = $v['rules'];
            foreach ($ruleArr as $rule) {
                if (($key = array_search($rule, $arr)) !== false) {
                    array_splice($arr, $key, 1);
                }
            }
            $rules = implode(',', $arr);
            self::where('id', $v['id'])->update(['rules'=>$rules]);
        }
    }
}
