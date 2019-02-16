<?php

//BlogRelation关联模型
class BlogRelationModel extends RelationModel{
    //定义主表名称
    protected $tableName = 'blog';

    protected $_link = array(
        //定义关联attr
        'attr' => array(    //关联attr表
            //定义关联关系
            'mapping_type' => MANY_TO_MANY,
            //定义中间表
            'relation_table' => 'ningbo_blog_attr',
            //定义主表外键
            'foreign_key' => 'blog_id',
            //定义副表外键
            'relation_key' => 'attr_id',
            //关联要查询的字段
            'mapping_fields' => 'name,color',
        ),
        //定义关联cate
        'cate' => array(
            //定义关联关系
            'mapping_type' => BELONGS_TO,
            //定义主表外键
            'foreign_key' => 'cate_id',
            //关联要查询的字段
            'mapping_fields' => 'name',
            //关联的字段值映射成数据对象中的某个字段
            'as_fields' => 'name:cate',
        ),
    );
    public function getBlog($limit = null,$deleted = 0){
        $field = array('deleted');
        $where = array('deleted' => $deleted);
        return $this -> where($where) -> field($field,true)-> relation(true) -> limit($limit) -> select();
    }
}