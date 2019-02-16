<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>分类列表</title>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/public.css" />
</head>
<body>
    <form action="<?php echo U(GROUP_NAME.'/Cate/cateSort');?>" method="post">
        <table class="table">
            <tr>
                <th colspan="5">分类列表</th>
            </tr>
            <tr>
                <th>分类ID</th>
                <th>分类名称</th>
                <th>分类级别</th>
                <th>分类排序</th>
                <th>操作</th>
            </tr>
            <?php if(is_array($cate)): foreach($cate as $key=>$v): ?><tr>
                    <td align="center"><?php echo ($v["id"]); ?></td>
                    <td align="center"><?php echo ($v["pre"]); echo ($v["name"]); echo ($v["suf"]); ?></td>
                    <td align="center"><?php echo ($v["level"]); ?></td>
                    <td align="center">
                        <input type="text" name="<?php echo ($v["id"]); ?>" value="<?php echo ($v["sort"]); ?>">
                    </td>
                    <td align="center">
                        <a href="<?php echo U(GROUP_NAME.'/Cate/addCate',array('pid' => $v['id']));?>">[添加子分类]</a>
                        <a href="">[修改]</a>
                        <a href="">[删除]</a>
                    </td>
                </tr><?php endforeach; endif; ?>
            <tr>
                <td colspan="5" align="center">
                    <input type="submit" value="排序">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>