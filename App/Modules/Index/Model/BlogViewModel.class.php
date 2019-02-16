<?php

//BlogView视图模型
class BlogViewModel extends ViewModel{
    protected $viewFields = array(
        'blog' => array(
            'id','title','content','click','time','cate_id',
            '_type'=> 'LEFT'
        ),
        'cate' => array(
            'name',
            '_on' => 'blog.cate_id = cate.id'
        ),
    );

    public function getAll($where,$limit){
        return $this -> where($where) -> limit($limit) -> order('time DESC') -> select();
    }
}