<?php
namespace app\admin\controller;

\think\Loader::import('controller/Controller', \think\Config::get('traits_path') , EXT);

use app\admin\Controller;
use think\Loader;

class Answer extends Controller
{
    use \app\admin\traits\controller\Controller;
    // 方法黑名单
    protected static $blacklist = [];
    protected function filter(&$map)
    {

    }
    public function beforeAdd(){

        $questionList=Loader::model('Question')->getList();
        $this->view->assign('question_list',$questionList);
    }
    public function beforeEdit(){

        $questionList=Loader::model('Question')->getList();
        $this->view->assign('question_list',$questionList);
    }
    
}
