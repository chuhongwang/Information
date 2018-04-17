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

    /**
     *class:${name}
     *user:褚红旺
     * @param string $where
     * @param string $filed
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * 获取班级列表
     */
    public function getList($where='1=1',$filed='id,class_name'){
        return $this->field($filed)->where($where)->where('isdelete=0 and status=1')->select();
    }
}
