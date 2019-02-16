<?php

class BlogAction extends CommonAction{
    //博客列表视图
    public function index(){
        import('ORG.Util.Page');
        $totalCount = M('Blog') -> where(array('deleted' => 0)) -> count();
        $page = new Page($totalCount,11);
        $limit = $page -> firstRow.','.$page -> listRows;

        $this -> blog = D('BlogRelation') -> getBlog($limit);
        $this -> page = $page -> show();
        $this -> display();
    }
    //删除，还原博客处理
    public function toTrach(){
        $id = I('id','','intval');
        $deleted = I('deleted',1,'intval');
        $msg = $deleted == 0?'还原':'删除';
        $blog = array(
            'id' => $id,
            'deleted' => $deleted
        );
        if(M('blog') -> save($blog)){
            $this -> success($msg.'成功！',U(GROUP_NAME.'/Blog/index'));
        }else{
            $this -> error($msg.'失败！');
        }
    }
    //回收站视图
    public function trach(){
        $this -> blog = D('BlogRelation') -> getBlog(1000000,1);
        $this -> display('index');
    }
    //彻底删除博客处理
    public function deleteBlog(){
        $id = I('id','','intval');

        if(M('blog') -> delete($id)){
            M('blog_attr') -> where(array('blog_id' => $id)) -> delete();
            $this -> success('删除成功',U(GROUP_NAME.'/Blog/trach'));
        }else{
            $this -> error('删除失败！');
        }
    }
    //清空回收站处理
    public function emptyTrach(){
        $where = array('deleted' => 1);
        $blog = M('blog') -> where($where)-> getField('id',true);
        if(M('blog') -> where(array('id' => array('in',$blog))) -> delete()){
            M('blog_attr') -> where(array('blog_id' => array('in',$blog))) -> delete();
            $this -> success('清空成功！',U(GROUP_NAME.'/Blog/trach'));
        }else{
            $this -> error('清空失败！');
        }
    }
    //添加博客视图
    public function addBlog(){
        import('Class.Cate',APP_PATH);
        $cate = M('cate') -> order('sort') -> select();
        $this -> cate = Cate::unlimitedone($cate);
        $this -> attr = M('attr') -> select();
        $this -> display();
    }
    //添加博客表单处理
    public function addBlogHandle(){
        $blog = array(
            'title' => I('title'),
            'content' => I('content'),
            'time' => time(),
            'click' => (int) $_POST['click'],
            'cate_id' => (int) $_POST['cate_id'],
        );
        //ThinkPHP关联模型多对多关联关系 添加的时候有BUG
        //D('BlogRelation') -> relation(true) -> add($blog);
        if($blog_id = M('blog') -> add($blog)){
            $sql = 'insert into ningbo_blog_attr (blog_id,attr_id) value';
            foreach($_POST['attr_id'] as $v){
                $sql .= '('.$blog_id.','.$v.'),';
            }
            $sql = trim($sql,',');  // $sql语句：insert into ningbo_blog_attr (blog_id,attr_id) value (*,*),(*,*)(*,*)
            M('blog_attr') -> query($sql);  //执行sql查询，
            $this -> success('保存成功！',U(GROUP_NAME.'/Blog/index'));
            /*$blog_attr = array();
            foreach($_POST['attr_id'] as $v){
                $attr[] = array(
                    'blog_id' => $blog_id,
                    'attr_id' => $v
                );
            }
            M('blog_attr') -> addAll($blog_attr);*/
        }else{
            $this -> error('保存失败！');
        }

    }
    //文件上传表单处理
    public function uploadFile(){
        import('ORG.Net.UploadFile');
        $uploadFile = new UploadFile();
        $uploadFile -> autoSub = true;      // 启用子目录保存文件
        $uploadFile -> subType = 'date';    // 子目录创建方式 hash date custom
        $uploadFile -> dateFormat = 'Ym';
        if($uploadFile -> upload('./Uploads/')){
            $uploadFileInfo = $uploadFile -> getUploadFileInfo();   //取得上传文件的信息
            //上传文件添加水印
            //import('ORG.Util.Image');
            //Image::water('./Uploads/'.$uploadFileInfo[0]['savename'],'./Data/logo.png');
            import('Class.Image',APP_PATH);
            Image::water('./Uploads/'.$uploadFileInfo[0]['savename']);

            //做点有意义的事
        }else{
            //做点没意义的事
        }
    }
}