<?php

class ListAction extends Action{
    //列表首页视图
    public function index(){
        $id = (int) $_GET['id'];

        $cate = M('cate') -> order('sort') -> select();
        import('Class.Cate',APP_PATH);
        $cateIds = Cate::getChildsId($cate,$id);
        $cateIds[] = $id;

        import('ORG.Util.Page');
        $where = array('cate_id' => array('in',$cateIds));
        $totalCount = M('blog') -> where($where) -> count();
        $page = new Page($totalCount,5);
        $limit = $page -> firstRow.','.$page -> listRows;

        $this -> blog = D('BlogView') -> getAll($where,$limit);
        $this -> page = $page -> show();
        $this -> display();
    }
}