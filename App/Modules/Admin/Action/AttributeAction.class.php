<?php

class AttributeAction extends CommonAction{
    //属性列表视图
    public function index(){
        $this -> attr = M('attr') -> select();
        $this -> display();
    }
    //添加属性视图
    public function addAttr(){
        $this -> display();
    }
    //添加属性表单处理
    public function addAttrHandle(){
        if(M('attr') -> add($_POST)){
            $this -> success('保存成功！',U(GROUP_NAME.'/Attribute/index'));
        }else{
            $this -> error('保存失败！');
        }
    }
}