<?php

class IndexAction extends CommonAction{
    //后台应用首页
    public function index(){
        $this -> username = $_SESSION['username'];
        $this -> display();
    }
    //退出登陆
    public function logout(){
        session_unset();
        session_destroy();
        $this -> redirect(GROUP_NAME.'/Login/index');
    }

}