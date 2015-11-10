<?php
/**
 * User: ZhangLi
 * Date: 2015/11/10
 * Time: 16:15
 */

class TagModel extends Model{
    function __construct(){
        parent::__construct('tags');
    }

    function getAll(){
        return $this->select();
    }
}