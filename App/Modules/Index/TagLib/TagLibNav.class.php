<?php

/*
 * 模板标签库
 * */
class TagLibNav extends TagLib{
    //定义标签
    protected $tags = array(
        //nav标签名
        'nav' => array('attr' => 'order','close' => 1), //attr 标签属性列表 close 是否闭合标签（0 或者1 默认为1，表示闭合）
        //new标签名
        'new' => array('attr' => 'limit','close' => 1),
    );
    //定义nav标签
    public function _nav($attr,$content){   //attr是属性列表，$content是存储标签之间的内容的
        $attr = $this -> parseXmlAttr($attr);
        $str = <<<str
<?php
    \$_nav_cate = M('cate') -> order('{$attr["order"]}') -> select();
    import('Class.Cate',APP_PATH);
    \$_nav_cate = Cate::unlimitedmany(\$_nav_cate);
    foreach(\$_nav_cate as \$_nav_cate_v):
    extract(\$_nav_cate_v);
    \$url = 'list_'.\$id;
?>
str;
    $str .= $content;
    $str .= '<?php endforeach;?>';
        return $str;
    }
    //定义new标签
    public function _new($attr,$content){
        $attr = $this -> parseXmlAttr($attr);
        $str = '<?php ';
        $str .= '$field = array("id","title","click");';
        $str .= '$_new_blog = M("blog") -> order("click DESC") -> field($field) -> limit('.$attr["limit"].') -> select();';
        $str .= 'foreach($_new_blog as $_new_v):';
        $str .= 'extract($_new_v);';
        $str .= '$url = "/show_".$id;?>';
        $str .= $content;
        $str .= '<?php endforeach;?>';
        return $str;
    }
}