<?php
namespace app\admin\controller;

\think\Loader::import('controller/Controller', \think\Config::get('traits_path') , EXT);

use app\admin\Controller;
use think\Loader;
use think\Db;

class Profession extends Controller
{
    use \app\admin\traits\controller\Controller;
    // 方法黑名单
    protected static $blacklist = [];

    protected function filter(&$map)
    {
        if ($this->request->param("id")) {
            $map['id'] = ["like", "%" . $this->request->param("id") . "%"];
        }
        if ($this->request->param("profession_name")) {
            $map['profession_name'] = ["like", "%" . $this->request->param("profession_name") . "%"];
        }
        if ($this->request->param("collage_id")) {
            $map['collage_id'] = $this->request->param("collage_id");
        }
        $collageList=\db('Collage')->where(['isdelete'=>0])->where(['status'=>1])->select();
        $this->view->assign('collageList',$collageList);
    }
    protected function beforeAdd(){
        $collage_list=Loader::model('Collage')->getList();
        $this->view->assign('collage_list',$collage_list);
    }
    protected function beforeEdit(){
        $collage_list=Loader::model('Collage')->getList();
        $this->view->assign('collage_list',$collage_list);
    }
}
