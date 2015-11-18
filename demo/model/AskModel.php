<?php
/**
 * User: ZhangLi
 * Date: 2015/11/13
 * Time: 10:34
 */

class AskModel extends Model{

    function __construct(){
        parent::__construct('ask');
    }

    function getAll(){
        return $this->select();
    }

}