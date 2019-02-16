<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加属性</title>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/public.css" />
</head>
<body>
    <form action="<?php echo U(GROUP_NAME.'/Attribute/addAttrHandle');?>" method="post">
        <table class="table">
            <tr>
                <th colspan="2al" align="center">添加属性</th>
            </tr>
            <tr>
                <td align="right" width="44%">属性名称</td>
                <td>
                    <input type="text" name="name">
                </td>
            </tr>
            <tr>
                <td align="right">属性颜色</td>
                <td>
                    <input type="text" name="color">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="保存添加">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>