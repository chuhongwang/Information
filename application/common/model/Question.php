<?php
namespace app\common\model;

use think\Model;

class Question extends Model
{
    // 指定表名,不含前缀
    protected $name = 'question';
    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    public function getList($where='1=1',$field='id,question'){
        return $this->field($field)->where($where)->where('isdelete=0 and status=1')->select();
    }
}
