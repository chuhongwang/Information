<?php
namespace app\admin\controller;

\think\Loader::import('controller/Controller', \think\Config::get('traits_path') , EXT);

use app\admin\Controller;

class StudentInformation extends Controller
{
    use \app\admin\traits\controller\Controller;
    // 方法黑名单
    protected static $blacklist = [];

    protected function filter(&$map)
    {
        if ($this->request->param("id")) {
            $map['id'] = ["like", "%" . $this->request->param("id") . "%"];
        }
        if ($this->request->param("student_num")) {
            $map['student_num'] = ["like", "%" . $this->request->param("student_num") . "%"];
        }
        if ($this->request->param("student_name")) {
            $map['student_name'] = ["like", "%" . $this->request->param("student_name") . "%"];
        }
    }
}
