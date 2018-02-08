<?php
namespace app\admin\controller;

use \app\admin\controller\AdminBase;
use think\view;
class Index extends AdminBase
{
    public function index()
    {
        $data = [1,2,3,4];

        $this->assign('data',$data);
        return $this->display();
    }
}
