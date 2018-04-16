<?php

namespace app\common\model;

use think\Model;

class Collage extends Model
{
    // 指定表名,不含前缀
    protected $name = 'collage';
    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    /**
     *class:${name}
     *user:褚红旺
     * @param string $where
     * @param string $field
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * 获取学院列表
     */
    public function getList($where = '1=1', $field = 'id,collage_name')
    {
        return $this->field($field)->where($where)->where('isdelete=0 and status=1')->select();
    }
}
