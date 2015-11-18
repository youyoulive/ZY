<?php
/**
 * User: ZhangLi
 * Date: 2015/11/9
 * Time: 15:33
 */

class Index extends Controller{
    public function run(){
        $Ask = new AskModel();
        $title = $Ask->table('ask a')->join('t_ask_a b on a.id = b.id','LEFT')->where('id = 2')->limit("2")->group('tag')->order("id ASC")->getAll();
        var_dump($title);
        $this->display('run.php');
    }
}