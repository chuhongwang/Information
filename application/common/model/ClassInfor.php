<?php
namespace app\common\model;

use think\Model;

class ClassInfor extends Model
{
    // 指定表名,不含前缀
    protected $name = 'class_infor';
    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    public function professionName(){
        return $this->hasOne('Profession','id','profession_id');
    }

    public function collageName(){
        return $this->hasOne('Collage','id','collage_id');
    }
}
