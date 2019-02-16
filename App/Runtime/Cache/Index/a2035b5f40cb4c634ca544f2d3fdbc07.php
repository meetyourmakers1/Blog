<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>博客</title>
    <link rel="stylesheet" href="__PUBLIC__/Css/common.css" />
    <script type="text/JavaScript" src='__PUBLIC__/Js/jquery-1.7.2.min.js'></script>
    <script type="text/JavaScript" src='__PUBLIC__/Js/common.js'></script>
    <link rel="stylesheet" href="__PUBLIC__/Css/index.css" />
</head>
<body>
<!--头部-->
<div class='top-search-wrap'>
    <div class='top-search'>
        <a href="http://bbs.houdunwang.com" target='_blank' class='logo'>
            <img src="__PUBLIC__/Images/logo.png"/>
        </a>
        <div class='search-wrap'>
            <form action="" method='get'>
                <input type="text" name='keyword' class='search-content'/>
                <input type="submit" name='search' value='搜索'/>
            </form>
        </div>
    </div>
</div>
<!--<?php $cate = M('cate') -> order('sort') -> select(); import('Class.Cate',APP_PATH); $cate = Cate::unlimitedmany($cate); ?>-->
<div class='top-nav-wrap'>
    <ul class='nav-lv1'>
        <li class='nav-lv1-li'>
            <a href="__GROUP__" class='top-cate'>博客首页</a>
        </li>
        <?php
 $_nav_cate = M('cate') -> order('sort') -> select(); import('Class.Cate',APP_PATH); $_nav_cate = Cate::unlimitedmany($_nav_cate); foreach($_nav_cate as $_nav_cate_v): extract($_nav_cate_v); $url = 'list_'.$id; ?><li class='nav-lv1-li'>
                <a href="<?php echo ($url); ?>" class='top-cate'><?php echo ($name); ?></a>
                <ul>
                    <?php if(is_array($child)): foreach($child as $key=>$v): ?><li><a href="<?php echo U('/list_'.$v['id']);?>"><?php echo ($v["name"]); ?></a><?php endforeach; endif; ?>
                </ul>
            </li><?php endforeach;?>
        <!--<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><li class='nav-lv1-li'>
                <a href="" class='top-cate'><?php echo ($v["name"]); ?></a>
                <ul>
                    <?php if(is_array($v["child"])): foreach($v["child"] as $key=>$val): ?><li><a href=""><?php echo ($val["name"]); ?></a><?php endforeach; endif; ?>
                </ul>
            </li><?php endforeach; endif; ?>-->
    </ul>
</div>
<!--主体-->
<div class='main'>
    <div class='main-left'>
        <p>全部博客</p>
        <?php if(is_array($topCate)): foreach($topCate as $key=>$v): ?><dl>
                <dt><?php echo ($v["name"]); ?><a href="<?php echo U('/list_'.$v['id']);?>">更多>></a></dt>
                <?php if(is_array($v["blog"])): foreach($v["blog"] as $key=>$blog): ?><dd>
                        <a href="<?php echo U('/show_'.$blog['id']);?>"><?php echo ($blog["title"]); ?></a>
                        <?php if(is_array($blog["attr"])): foreach($blog["attr"] as $key=>$attr): ?><a style="font-size:10px;padding:0px 2px;color:<?php echo ($attr["color"]); ?>">[<?php echo ($attr["name"]); ?>]</a><?php endforeach; endif; ?>
                        <span><?php echo (date('Y/m/d',$blog["time"])); ?></span>
                    </dd><?php endforeach; endif; ?>
            </dl><?php endforeach; endif; ?>
    </div>
    <!--主体右侧-->
<div class='main-right'>
    <!--热门博客-->
    <?php echo W('Hot');?>
    <?php echo W('Hot');?>

    <dl>
        <dt>最新发布</dt>
        <?php $field = array("id","title","click");$_new_blog = M("blog") -> order("click DESC") -> field($field) -> limit(5) -> select();foreach($_new_blog as $_new_v):extract($_new_v);$url = "/show_".$id;?><dd>
                <a href="<?php echo U($url);?>"><?php echo ($title); ?></a>
                <span>(<?php echo ($click); ?>)</span>
            </dd><?php endforeach;?>
    </dl>

    <dl>
        <dt>友情连接</dt>
        <dd>
            <a href="">Google</a>
        </dd>

        <dd>
            <a href="">Firefox</a>
        </dd>
        <dd>
            <a href="">php官网</a>
        </dd>
    </dl>
</div>
</div>
<!--底部-->
<!--
<div class='bottom'>
    <div></div>
</div>
</body>
</html>-->