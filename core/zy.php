<?php
/**
 * User: ZhangLi
 * Date: 2015/11/9
 * Time: 15:22
 */
class zy{
    private $class;
    private $action;

    function __construct(){
        if(!($this->class = trim($_GET['c']))){
            $this->class = "Index";
        }
        if(!($this->action = trim($_GET['a']))){
            $this->action = "run";
        }
    }

    function run(){
        $obj = new $this->class;
        $method = $this->action;
        $obj->$method();
    }

}

spl_autoload_register(function ($class) {
    $file1 = './control/' . $class . '.class.php';
    $file2 = './model/' . $class . '.php';
    $file3 = '../core/'. $class . '.php';
    if(file_exists($file1)){
        include_once $file1;
    }
    if(file_exists($file2)){
        include_once $file2;
    }
    if(file_exists($file3)){
        include_once $file3;
    }
});