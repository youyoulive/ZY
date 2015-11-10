<?php
/**
 * User: ZhangLi
 * Date: 2015/11/9
 * Time: 15:33
 */

class Index extends Controller{
    public function run(){
        $User = new UserModel();
        $data = $User->getAll();
        var_dump($data);

        $Tag = new TagModel();
        $data = $Tag->getAll();
        var_dump($data);
        $this->display('run.php');
    }
}