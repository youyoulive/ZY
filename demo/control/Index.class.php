<?php
/**
 * User: ZhangLi
 * Date: 2015/11/9
 * Time: 15:33
 */

class Index extends Controller{
    public function run(){
        /*
        $User = new UserModel();
        $data = $User->getAll();
        var_dump($data);

        $Tag = new TagModel();
        $data = $Tag->getAll();
        var_dump($data);
        */
        $data['username'] = "demo01";
        $data['sex'] = "3";
        $User = new UserModel();
        $res = $User->where("id = 2")->delete();
        var_dump($res);
        $this->display('run.php');
    }
}