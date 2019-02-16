<?php

class ShowAction extends Action{
    //展示首页视图
    public function index(){
        $id = I('id','','intval');

        $field = array('title','time','content','cate_id');
        //M('blog') -> where(array('id' => $id)) -> setInc('click');

        //$field = array('title','time','click','content','cate_id');
        $this -> blog = D('BlogView') -> order('time DESC') -> find($id);

        $cateId = $this -> blog['cate_id'];
        $cate = M('cate') -> order('sort') -> select();
        import('Class.Cate',APP_PATH);
        $this -> cateParents = Cate::getParents($cate,$cateId);

        $this -> display();
    }
    //点击次数处理
    public function clickNumHandle(){
        $id = I('id','','intval');
        $where = array('id' => $id);
        M('blog') -> where($where) -> setInc('click');
        $click = M('blog') -> where(array('id' => $id)) -> getField('click');
        echo 'document.write('.$click.')';
    }
}