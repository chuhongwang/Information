<?php
namespace app\admin\controller;

\think\Loader::import('controller/Controller', \think\Config::get('traits_path') , EXT);

use app\admin\Controller;
use think\Loader;

class ClassInfor extends Controller
{
    use \app\admin\traits\controller\Controller;
    // 方法黑名单
    protected static $blacklist = [];

    protected function filter(&$map)
    {
        if ($this->request->param("id")) {
            $map['id'] = ["like", "%" . $this->request->param("id") . "%"];
        }
        if ($this->request->param("class_name")) {
            $map['class_name'] = ["like", "%" . $this->request->param("class_name") . "%"];
        }
    }

    protected function beforeAdd(){
        $pro_list=Loader::model('Profession')->getList();
        $collage_list=Loader::model('Collage')->getList();

        $this->view->assign('pro_list',$pro_list);
        $this->view->assign('collage_list',$collage_list);
    }

    protected function beforeEdit(){
        $pro_list=Loader::model('Profession')->getList();
        $collage_list=Loader::model('Collage')->getList();

        $this->view->assign('pro_list',$pro_list);
        $this->view->assign('collage_list',$collage_list);
    }
}
