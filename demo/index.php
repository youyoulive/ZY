<?php
/**
 * User: ZhangLi
 * Date: 2015/11/9
 * Time: 15:21
 */
error_reporting(0);
#error_reporting(E_ALL);
define(DIR_ROOT, dirname(__FILE__));
include "../core/zy.php";
$zy = new zy();
$zy->run();