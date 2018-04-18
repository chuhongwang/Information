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
        if ($this->request->param("profession_id")) {
            $map['profession_id'] = $this->request->param("profession_id");
        }
        if ($this->request->param("collage_id")) {
            $map['collage_id'] = $this->request->param("collage_id");
        }

        $collageList=db('Collage')->where(['isdelete'=>0])->where(['status'=>1])->select();
        $proList=db('Profession')->where(['isdelete'=>0])->where(['status'=>1])->select();
        $this->view->assign('collageList',$collageList);
        $this->view->assign('proList',$proList);
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
