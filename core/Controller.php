<?php
/**
 * User: ZhangLi
 * Date: 2015/11/9
 * Time: 15:35
 */

class Controller{

    function display($file){
        $str = "./view/".$file;
        include $str;
    }
}