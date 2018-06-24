<?php

namespace app\admin\validate;

use think\Validate;

class Conf extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'cnname' => 'require|unique:conf|max:50',
        'enname' => 'require|unique:conf|max:50',
        'type' => 'require'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'cnname.require' => '请填写配置中文名称',
        'cnname.unique' => '该配置已经存在',
        'cnname.max' => '配置名称过长,请限定在50个字符以内',
        'enname.require' => '请填写配置英文名称',
        'enname.unique' => '该配置已经存在',
        'enname.max' => '配置名称过长,请限定在50个字符以内',
        'type.require' => '请选择配置类型'
    ];
}
