<?php
/**
 * User: ZhangLi
 * Date: 2015/11/9
 * Time: 15:33
 */

class Index extends Controller{
    public function run(){
        $User = new UserModel();
        $data = $User->getNews();
        $this->display('run.php');
    }
}