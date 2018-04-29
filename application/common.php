<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * 模拟tab产生空格
 * @param int $step
 * @param string $string
 * @param int $size
 * @return string
 */
function tab($step = 1, $string = ' ', $size = 4)
{
    return str_repeat($string, $size * $step);
}

function face($id)
{
    $faceList = [
        1 => '群众',
        2 => '团员',
        3 => '党员',
    ];
    return empty($faceList[$id]) ? "--" : $faceList[$id];
}

function graduation($id)
{
    $graduationList = [
        1 => '就业',
        2 => '考研',
        3 => '考公务员',
        4 => '出国留学',
        5 => '创业',
    ];
    return empty($graduationList[$id]) ? '--' : $graduationList[$id];
}