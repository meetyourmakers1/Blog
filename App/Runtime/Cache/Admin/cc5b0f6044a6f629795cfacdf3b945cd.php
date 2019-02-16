<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>设置验证码</title>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/public.css" />
</head>
<body>
    <form action="<?php echo U(GROUP_NAME.'/System/verifyHandle');?>" method="post">
        <table class="table">
            <tr>
                <th colspan="2" align="center">设置验证码</th>
            </tr>
            <tr>
                <td align="right" width="44%">验证码长度</td>
                <td>
                    <input type="text" name="VERIFY_LENGTH" value="<?php echo (C("VERIFY_LENGTH")); ?>">
                </td>
            </tr>
            <tr>
                <td align="right">验证码字体大小</td>
                <td>
                    <input type="text" name="VERIFY_SIZE" value="<?php echo (C("VERIFY_SIZE")); ?>" disabled>
                </td>
            </tr>
            <tr>
                <td align="right">验证码字体颜色</td>
                <td>
                    <input type="text" name="VERIFY_COLOR" value="<?php echo (C("VERIFY_COLOR")); ?>" disabled>
                </td>
            </tr>
            <tr>
                <td align="right">验证码图片宽度</td>
                <td>
                    <input type="text" name="VERIFY_WIDTH" value="<?php echo (C("VERIFY_WIDTH")); ?>" disabled>
                </td>
            </tr>
            <tr>
                <td align="right">验证码图片高度</td>
                <td>
                    <input type="text" name="VERIFY_HEIGHT" value="<?php echo (C("VERIFY_HEIGHT")); ?>" disabled>
                </td>
            </tr>
            <tr>
                <td align="right">验证码背影颜色</td>
                <td>
                    <input type="text" name="VERIFY_BGCOLOR" value="<?php echo (C("VERIFY_BGCOLOR")); ?>" disabled>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="hidden" name="VERIFY_SEED" value="<?php echo (C("VERIFY_SEED")); ?>">
                    <input type="hidden" name="VERIFY_FONTFILE" value="<?php echo (C("VERIFY_FONTFILE")); ?>">
                    <input type="hidden" name="VERIFY_NAME" value="<?php echo (C("VERIFY_NAME")); ?>">
                    <input type="hidden" name="VERIFY_FUNC" value="<?php echo (C("VERIFY_FUNC")); ?>">
                    <input type="submit" value="保存添加">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>