<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>属性列表</title>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/public.css" />
</head>
<body>
    <table class="table">
        <tr>
            <th colspan="4" align="center">属性列表</th>
        </tr>
        <tr>
            <th align="center">属性ID</th>
            <th align="center">属性名称</th>
            <th align="center">属性颜色</th>
            <th align="center">操作</th>
        </tr>
        <?php if(is_array($attr)): foreach($attr as $key=>$v): ?><tr>
                <td align="center"><?php echo ($v["id"]); ?></td>
                <td align="center"><?php echo ($v["name"]); ?></td>
                <td align="center">
                    <div style="width: 10px;height: 10px;background: <?php echo ($v["color"]); ?>;"></div>
                </td>

                <td align="center">
                    <a href="">[修改]</a>
                    <a href="">[删除]</a>
                </td>
            </tr><?php endforeach; endif; ?>
    </table>
</body>
</html>