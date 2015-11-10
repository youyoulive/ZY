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

    function select(){
        $sql = "select " . $this->options['field'];

        if($this->options['tableName']){
            $sql .= " from " .$this->options['tableName'];
        }else{
            die("table not exists");
        }

        if($this->options['where']){
            $sql .= " where " .$this->options['where'];
        }

        if($this->options['order']){
            $sql .= " order by " .$this->options['order'];
        }
        if($this->options['limit']){
            $sql .= " limit " . $this->options['limit'];
        }

        $result = mysql_query($sql);
        $resultArray = array();
        while($res = mysql_fetch_assoc($result)){
            $resultArray[] = $res;
        }
        return $resultArray;
    }

    function find(){
        $sql = "select " . $this->options['field'];

        if($this->options['tableName']){
            $sql .= " from " .$this->options['tableName'];
        }else{
            die("table not exists");
        }

        if($this->options['where']){
            $sql .= " where " .$this->options['where'];
        }

        if($this->options['order']){
            $sql .= " order by " .$this->options['order'];
        }

        $sql .= " limit 0,1";


        $result = mysql_query($sql);
        $res = mysql_fetch_assoc($result);
        return $res;
    }

    function table($tablename){
        $this->options['tableName'] = $tablename;
        return $this;
    }

    function field($field){
        if(!is_string($field)) {
            $field = "*";
        }
        $this->options['field']   =   $field;
        return $this;
    }

    function order($order){
        if(!is_string($order)){
            $order = "id DESC";
        }
        $this->options['order']   =   $order;
        return $this;
    }

    function limit($limit){
        $this->options['limit'] = $limit;
        return $this;
    }

    function where($where){
        $this->options['where'] = $where;
        return $this;
    }



}