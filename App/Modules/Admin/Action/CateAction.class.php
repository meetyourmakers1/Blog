<?php

class CateAction extends CommonAction{
    //分类列表视图
    public function index(){
        import('Class.Cate',APP_PATH);
        $cate = M('cate') -> order('sort') -> select();
        $this -> cate = Cate::unlimitedone($cate);
        $this -> display();
    }
    //分类排序表单处理
    public function cateSort(){
        foreach($_POST as $id => $sort){
            M('cate') -> where(array('id' => $id)) -> setField('sort',$sort);
        }
        $this -> redirect(GROUP_NAME.'/Cate/index');
    }
    //添加分类视图
    public function addCate(){
        $this -> pid = I('pid',0,'intval');
        $this -> display();
    }
    //添加分类表单处理
    public function addCateHandle(){
        if(M('cate') -> add($_POST)){
            $this -> success('保存成功！',U(GROUP_NAME.'/Cate/index'));
        }else{
            $this -> error('保存失败！');
        }
    }
}