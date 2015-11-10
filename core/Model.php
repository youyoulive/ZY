<?php
/**
 * User: ZhangLi
 * Date: 2015/11/9
 * Time: 16:06
 */

class Model{
    private $db;
    private $tableName;
    private $options;
    private $lastSql;

    function __construct($tableName){
        $this->db = Db::getDb();
        $this->options['field'] = "*";
        $this->options['where'] = "";
        $this->tableName = $tableName;
    }


    function select(){
        $this->lastSql = "select ".$this->options['field']." from ".$this->tableName." ".$this->options['where'];
        return $this->db->querySelect($this->lastSql);
    }

    function field($data){
        if(is_array($data)){
            $str = implode(",", $data);
        }else if(is_string($data)){
            $str = $data;
        }else{
            $str = "*";
        }
        $this->options['field'] = $str;
        return $this;
    }

    function insert($data){

    }

    function update($data){

    }

    function del(){

    }

    function order(){

    }

    function limit(){

    }

    function join(){

    }

    function group(){

    }

    function where($data){
        if(is_array($data)){
            $str = " ";
        }else if(is_string($data)){
            $str = " where " .$data;
        }else{
            $str = " ";
        }
        $this->options['where'] = $str;
        return $this;
    }

   public function getLastSql(){
        return $this->lastSql;
    }

}