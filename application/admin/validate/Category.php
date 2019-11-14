<?php
/**
 * Created by PhpStorm.
 * User: 剑港
 * Date: 2019/10/29
 * Time: 16:52
 */

namespace app\admin\validate;


use think\Validate;

class Category extends Validate
{
protected $rule=[
    'cname'=>'require|min:2|max:4',
    'thumb'=>'require',
    'sort'=>'require|number',

];
protected $message=[
    'thumb'=>'thumb字段必填',
    'cname.require'=>'cname字段必填',
    'cname.min'=>'cname最少2个字符'
];
protected $scene=[
    'insert'=>['cname','thumb','sort']
];

}