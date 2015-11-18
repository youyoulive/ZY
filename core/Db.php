<?php
/**
 * User: ZhangLi
 * Date: 2015/11/9
 * Time: 16:32
 */

class Db{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '123321';
    private $port = 3306;
    private $dbname = 'test';
    static public $count;
    static public $i;
    public $options;

    static function getDb(){
        if(!(bool)(self::$count)){
            self::$count = new Db(); 	//如果本类中的count为空，说明还没有被实例化过
        }
        return self::$count;   		//返回本类的对象
    }

    private function __construct(){
        mysql_connect($this->host .":". $this->port, $this->username,$this->password);
        mysql_select_db($this->dbname);
        self ::$i++;
    }

    function querySelect($sql){
        $result = mysql_query($sql);
        $resultArray = array();
        while($res = mysql_fetch_assoc($result)){
            $resultArray[] = $res;
        }
        return $resultArray;
    }

    function queryInsert($sql){
        if(mysql_query($sql)){
            return mysql_insert_id();
        }else{
            return false;
        }
    }

    function queryUpdate($sql){
        if(mysql_query($sql)){
            return mysql_affected_rows();
        }else{
            return false;
        }
    }

    function queryDelete($sql){
        if(mysql_query($sql)){
            return mysql_affected_rows();
        }else{
            return false;
        }
    }
}