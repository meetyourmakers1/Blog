<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        <?php if(ACTION_NAME == 'index'): ?>博客列表
        <?php else: ?>
            回收站列表<?php endif; ?>
    </title>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/public.css" />
</head>
<body>
    <table class="table">
        <tr>
            <th colspan="7" align="center">
                <?php if(ACTION_NAME == 'index'): ?>博客列表
                <?php else: ?>
                    回收站列表<?php endif; ?>
            </th>
        </tr>
        <tr>
            <th align="center">博客ID</th>
            <th align="center">博客标题</th>
            <th align="center">博客属性</th>
            <th align="center">博客分类</th>
            <th align="center">点击次数</th>
            <th align="center">发布时间</th>
            <th align="center">操作</th>
        </tr>
        <?php if(is_array($blog)): foreach($blog as $key=>$v): ?><tr>
                <td align="center"><?php echo ($v["id"]); ?></td>
                <td align="center"><?php echo ($v["title"]); ?></td>
                <td align="center">
                    <?php if(is_array($v["attr"])): foreach($v["attr"] as $key=>$val): ?><span style="color:<?php echo ($val["color"]); ?>;padding:0 5px;">[<?php echo ($val["name"]); ?>]</span><?php endforeach; endif; ?>
                </td>
                <td align="center"><?php echo ($v["cate"]); ?></td>
                <td align="center"><?php echo ($v["click"]); ?></td>
                <td align="center"><?php echo (date('y-m-d H:i',$v["time"])); ?></td>
                <td align="center">
                    <?php if(ACTION_NAME == 'index'): ?><a href="">[修改]</a>
                        <a href="<?php echo U(GROUP_NAME.'/Blog/toTrach',array('id' => $v['id']));?>">[删除]</a>
                    <?php else: ?>
                        <a href="<?php echo U(GROUP_NAME.'/Blog/toTrach',array('id' => $v['id'],'deleted' => 0));?>">[还原]</a>
                        <a href="<?php echo U(GROUP_NAME.'/Blog/deleteBlog',array('id' => $v['id']));?>">[彻底删除]</a><?php endif; ?>
                </td>
            </tr><?php endforeach; endif; ?>
        <tr>
            <td colspan="7" align="center"><?php echo ($page); ?></td>
        </tr>
        <?php if(ACTION_NAME == 'trach'): ?><tr>
                <td colspan="7" align="center">
                    <a href="<?php echo U(GROUP_NAME.'/Blog/emptyTrach');?>">清空回收站</a>
                </td>
            </tr><?php endif; ?>
    </table>
</body>
</html>