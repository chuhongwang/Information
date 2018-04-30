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
        if ($this->request->param("year")) {
            $map['year'] = ["like", "%" . $this->request->param("year") . "%"];
        }
        if ($this->request->param("student_num")) {
            $map['student_num'] = ["like", "%" . $this->request->param("student_num") . "%"];
        }
        if ($this->request->param("student_name")) {
            $map['student_name'] = ["like", "%" . $this->request->param("student_name") . "%"];
        }
        if ($this->request->param("gender")) {
            $map['gender'] = $this->request->param("gender");
        }
        if ($this->request->param("collage_id")) {
            $map['collage_id'] = $this->request->param("collage_id");
        }
        if ($this->request->param("profession_id")) {
            $map['profession_id'] = $this->request->param("profession_id");
        }
        if ($this->request->param("class_id")) {
            $map['class_id'] = $this->request->param("class_id");
        }
        $collagList=\db('Collage')->where(['isdelete'=>0])->where(['status'=>1])->select();
        $proList=\db('Profession')->where(['isdelete'=>0])->where(['status'=>1])->select();
        $classList=\db('ClassInfor')->where(['isdelete'=>0])->where(['status'=>1])->select();
        $this->view->assign('collageList',$collagList);
        $this->view->assign('proList',$proList);
        $this->view->assign('classList',$classList);
    }

    protected function beforeAdd(){

        $collage_list=Loader::model('Collage')->getList();
        $pro_list=Loader::model('Profession')->getList();
        $class_list=Loader::model('ClassInfor')->getList();
        $question_list=Loader::model('Question')->getList();

        $this->view->assign('collage_list',$collage_list);
        $this->view->assign('pro_list',$pro_list);
        $this->view->assign('class_list',$class_list);
        $this->view->assign('question_list',$question_list);
    }

    protected function beforeEdit(){

        $collage_list=Loader::model('Collage')->getList();
        $pro_list=Loader::model('Profession')->getList();
        $class_list=Loader::model('ClassInfor')->getList();
        $question_list=Loader::model('Question')->getList();
        $this->view->assign('collage_list',$collage_list);
        $this->view->assign('pro_list',$pro_list);
        $this->view->assign('class_list',$class_list);
        $this->view->assign('question_list',$question_list);
    }
    public function add(){
        $controller = $this->request->controller();
        if ($this->request->isAjax()) {
            // 插入
            $data = $this->request->except(['id']);
            //基本信息
            $data_infor=[];
            //问卷信息
            $data_answer=[];
            $data_infor['student_num']=$data['student_num'];
            $data_infor['student_name']=$data['student_name'];
            $data_infor['id_number']=$data['id_number'];
            $data_infor['gender']=$data['gender'];
            $data_infor['nation']=$data['nation'];
            $data_infor['birthday']=$data['birthday'];
            $data_infor['phone']=$data['phone'];
            $data_infor['address']=$data['address'];
            $data_infor['face']=$data['face'];
            $data_infor['year']=$data['year'];
            $data_infor['collage_id']=$data['collage_id'];
            $data_infor['profession_id']=$data['profession_id'];
            $data_infor['class_id']=$data['class_id'];
            $data_infor['graduation']=$data['graduation'];
            // 简单的直接使用db写入
            Db::startTrans();
            try{
                $db=\db('student_information')->insert($data_infor);
                //接收问卷答案
                $i=1;
                while ($i<count($data)){
                    if(isset($data['question'.$i])){
                        $data_answer['student_num']=$data['student_num'];
                        $data_answer['question_id']=$i;
                        $data_answer['answer_id']=$data['question'.$i];
                        $db_answer=\db('student_answer')->insert($data_answer);
                    }
                    $i++;
                }
                // 提交事务
                Db::commit();
            }catch (\Exception $e){
                // 回滚事务
                Db::rollback();
                return ajax_return_adv_error($e->getMessage());
            }
            return ajax_return_adv('添加成功');
        }else {
            // 添加
            return $this->view->fetch(isset($this->template) ? $this->template : 'edit');
        }
    }
}
