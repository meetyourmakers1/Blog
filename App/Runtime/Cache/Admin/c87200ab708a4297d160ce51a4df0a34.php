<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加博客</title>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/public.css" />
    <script type="text/javascript">
        window.UEDITOR_HOME_URL = '__ROOT__/Data/ueditor/';
        window.onload = function(){
            window.UEDITOR_CONFIG.initialFrameWidth = 1025  //初始化编辑器宽度,默认1000
            window.UEDITOR_CONFIG.initialFrameHeight = 200; //初始化编辑器高度,默认320
            UE.getEditor('content');
        }
    </script>
    <script type="text/javascript" charset="utf-8" src="__ROOT__/Data/Ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="__ROOT__/Data/Ueditor/ueditor.all.min.js"> </script>
</head>
<body>
    <form action="<?php echo U(GROUP_NAME.'/Blog/addBlogHandle');?>" method="post">
        <table class="table">
            <tr>
                <th colspan="2">添加博客</th>
            </tr>
            <tr>
                <td align="right">博客分类</td>
                <td>
                    <select name="cate_id">
                        <option value="">===请选择分类===</option>
                        <?php if(is_array($cate)): foreach($cate as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["pre"]); echo ($v["name"]); ?></option><?php endforeach; endif; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right">博客属性</td>
                <td>
                    <?php if(is_array($attr)): foreach($attr as $key=>$v): ?><input type="checkbox" name="attr_id[]" value="<?php echo ($v["id"]); ?>">&nbsp;<?php echo ($v["name"]); ?>&nbsp;&nbsp;&nbsp;<?php endforeach; endif; ?>
                </td>
            </tr>
            <tr>
                <td align="right">点击次数</td>
                <td>
                    <input type="text" name="click">
                </td>
            </tr>
            <tr>
                <td align="right">博客标题</td>
                <td>
                    <input type="text" name="title">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea name="content" id="content"></textarea>
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