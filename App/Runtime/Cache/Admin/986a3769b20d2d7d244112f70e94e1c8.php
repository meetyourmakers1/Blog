<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加分类</title>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/public.css" />
</head>
<body>
    <form action="<?php echo U(GROUP_NAME.'/Cate/addCateHandle');?>" method="post">
        <table class="table">
            <tr>
                <th colspan="2" align="center">添加分类</th>
            </tr>
            <tr>
                <td align="right" width="44%">分类名称</td>
                <td>
                    <input type="text" name="name">
                </td>
            </tr>
            <tr>
                <td align="right">分类排序</td>
                <td>
                    <input type="text" name="sort" value="100">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="hidden" name="pid" value="<?php echo ($pid); ?>">
                    <input type="submit" value="保存添加">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>