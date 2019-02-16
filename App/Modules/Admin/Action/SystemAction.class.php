<?php

class SystemAction extends CommonAction{
    //验证码设置视图
    public function verify(){
        $this -> display();
    }
    //设置验证码表单处理
    public function verifyHandle(){
        if(F('verify',$_POST,CONF_PATH)){   //CONF_PATH配置文件目录， 及就是 APP_NAME.'/Conf/' 目录
            $this -> success('保存成功！',U(GROUP_NAME.'/System/verify'));
        }else{
            $this -> error('保存失败！请修改'.CONF_PATH.'verify.php');
        }
    }
}