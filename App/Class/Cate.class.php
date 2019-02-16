<?php

class Cate{
    //递归重组数组为一维数组
    static public function unlimitedone($array,$pre='----',$pid=0,$level=0){
        $arr = array();
        foreach($array as $v){
            if($v['pid'] == $pid){
                $v['level'] = $level + 1;
                $v['pre'] = str_repeat($pre,$level);
                $arr[] = $v;
                $arr = array_merge($arr,self::unlimitedone($array,$pre,$v['id'],$level+1));
            }
        }
        return $arr;
    }
    //递归重组数组为多位数组
    static public function unlimitedmany($array,$name='child',$pid=0){
        $arr = array();
        foreach($array as $v){
            if($v['pid'] == $pid){
                $v[$name] = self::unlimitedmany($array,$name,$v['id']);
                $arr[] = $v;
            }
        }
        return $arr;
    }
    //传递一个子分类ID，返回所有的父级分类的ID
    static public function getParentsId($array,$id){
        $arr = array();
        foreach($array as $v){
            if($v['id'] == $id){
                $arr[] = $v['id'];
                $arr = array_merge(self::getParentsId($array,$v['pid']),$arr);
            }
        }
        return $arr;
    }
    //传递一个父级分类的ID，返回所有子分类的ID
    static public function getChildsId($array,$id){
        $arr = array();
        foreach($array as $v){
            if($v['pid'] == $id){
                $arr[] = $v['id'];
                $arr = array_merge($arr,self::getChildsId($array,$v['id']));
            }
        }
        return $arr;
    }
    //传递一个子分类ID，返回所有的父级分类
    static public function getParents($array,$id){
        $arr = array();
        foreach($array as $v){
            if($v['id'] == $id){
                $arr[] = $v;
                $arr = array_merge(self::getParents($array,$v['pid']),$arr);
            }
        }
        return $arr;
    }
    //传递一个父级分类的ID，返回所有子分类
    static public function getChilds($array,$id){
        $arr = array();
        foreach($array as $v){
            if($v['pid'] == $id){
                $arr[] = $v;
                $arr = array_merge($arr,self::getChilds($array,$v['id']));
            }
        }
        return $arr;
    }
}