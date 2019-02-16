<?php

class LoginAction extends Action{
    //登录视图
    public function index(){
        $this -> display();
    }
    //验证码
    public function verify(){
        import('Class.Image',APP_PATH);
        Image::verify();
    }

    //登录表单处理
    public function login(){
        if(!IS_POST) halt('页面不存在，请稍候重试！');
        if(strtolower(I('code')) != session('verify')) halt('验证码不正确！');
        $user = M('user') -> where(array('username' => I('username'))) -> find();
        if(!user || I('password','','md5') != $user['password']) halt('用户名或密码不正确！');
        $data = array(
            'id' => $user['id'],
            'logintime' => time(),
            'loginip' => get_client_ip(),
        );
        M('user') -> save($data);
        session('uid',$user['id']);
        session('username',$user['username']);
        session('logintime',$user['logintime']);
        session('loginip',$user['loginip']);
        redirect(__GROUP__);
    }
}