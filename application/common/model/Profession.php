<?php

namespace app\common\model;

use think\Model;

class Profession extends Model
{
    // 指定表名,不含前缀
    protected $name = 'profession';
    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    public function collageName(){
        return $this->hasOne('Collage','id','collage_id');
    }

}
