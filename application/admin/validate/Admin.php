<?php

namespace app\admin\validate;

use think\Validate;

class Admin extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'username' => 'require|unique:Admin|max:20',
        'password' => 'require'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'username.require' => '请输入用户名',
        'username.unique' => '此管理员用户已经被注册',
        'username.max' => '用户名过长,请限定在20个字符内',
        'password.require' => '密码为空',
    ];
    protected $scene = [
        'update' => ['username' => 'require|max:20', 'password']
    ];
}
