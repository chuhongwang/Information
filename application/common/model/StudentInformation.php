<?php
namespace app\common\model;

use think\Model;

class StudentInformation extends Model
{
    // 指定表名,不含前缀
    protected $name = 'student_information';
    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    public function CollageName(){
        return $this->hasOne('Collage','id','collage_id');
    }

    public function ProfessionName(){
        return $this->hasOne('Profession','id','profession_id');
    }

    public function ClassName(){
        return $this->hasOne('ClassInfor','id','class_id');
    }
}
