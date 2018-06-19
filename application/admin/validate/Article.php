<?php

namespace app\admin\validate;

use think\Validate;

class Article extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'title' => 'require|max:100',
        'content' => 'require',
        'des' => 'require|max:255',
        'keywords' => 'require|max:255',
        'cid' => 'require|number'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
}
