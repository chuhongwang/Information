<?php
namespace app\admin\controller;

\think\Loader::import('controller/Controller', \think\Config::get('traits_path') , EXT);

use app\admin\Controller;
use think\Db;
use think\Loader;

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

    protected function beforeAdd(){

        $collage_list=Loader::model('Collage')->getList();
        $pro_list=Loader::model('Profession')->getList();
        $class_list=Loader::model('ClassInfor')->getList();
        $this->view->assign('collage_list',$collage_list);
        $this->view->assign('pro_list',$pro_list);
        $this->view->assign('class_list',$class_list);
    }

    protected function beforeEdit(){

        $collage_list=Loader::model('Collage')->getList();
        $pro_list=Loader::model('Profession')->getList();
        $class_list=Loader::model('ClassInfor')->getList();
        $this->view->assign('collage_list',$collage_list);
        $this->view->assign('pro_list',$pro_list);
        $this->view->assign('class_list',$class_list);
    }
//    public function add(){
//        $controller = $this->request->controller();
//        if ($this->request->isAjax()) {
//            // 插入
//            $data = $this->request->except(['id']);
//            // 简单的直接使用db写入
//            Db::startTrans();
//            try{
//                $db=\db('student_information')->insert($data);
//                // 提交事务
//                Db::commit();
//            }catch (\Exception $e){
//                // 回滚事务
//                Db::rollback();
//                return ajax_return_adv_error($e->getMessage());
//            }
//            return ajax_return_adv('添加成功');
//        }
//    }
}
