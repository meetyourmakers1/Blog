<?php if (!defined('THINK_PATH')) exit();?><!--热门博客模板-->
<dl>
    <dt>热门博客</dt>
    <?php if(is_array($blog)): foreach($blog as $key=>$v): ?><dd>
            <a href="<?php echo U('/show_'.$v['id']);?>"><?php echo ($v["title"]); ?></a>
            <span>(<?php echo ($v["click"]); ?>)</span>
        </dd><?php endforeach; endif; ?>
</dl>