<?php

class IndexAction extends Action{
    //前端应用首页
    public function index(){
        if(!$topCate = S('topCate')){
            $topCate = M('cate') -> where(array('pid' => 0)) -> field(array('id','name')) -> order('sort DESC') -> select();
            import('Class.Cate',APP_PATH);
            $cate = M('cate') -> order('sort') -> select();
            foreach($topCate as $k => $v){
                $cates = Cate::getChildsId($cate,$v['id']);
                $cates[] = $v['id'];
                $topCate[$k]['blog'] = D('BlogRelation')
                    -> relation('attr')
                    -> where(array('cate_id' => array('in',$cates)))
                    -> field(array('id','title','time'))
                    -> limit(5)
                    -> order('time DESC')
                    -> select();
            }
            S('topCate',$topCate,1);
        }
        $this -> topCate = $topCate;
        $this -> display();
    }
}