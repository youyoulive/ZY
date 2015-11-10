<?php
/**
 * User: ZhangLi
 * Date: 2015/11/9
 * Time: 16:05
 */

class UserModel extends Model{

    function __construct(){
        parent::__construct('user');
    }

    function getTable(){
        return 'user';
    }

    function getNews() {
       $db = Db::getDb();
        $result = $db->select();
        var_dump($result);
        while($row = mysql_fetch_row($result)){
            var_dump($row);
        }
    }

}