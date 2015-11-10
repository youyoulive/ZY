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

    function getAll(){
        return $this->field("id,username")->select();
    }

}