<?php
namespace app\admin\controller;
/**
 * Created by Loner.
 * Date: 2018/2/7 14:53
 * Description:
 */
use app\admin\library\Logger;
use \think\Controller;
class AdminBase extends Controller{

    public $logger      = null;
    public $module      = null;
    public $controller  = null;
    public $action      = null;

    public function __construct()
    {
        parent::__construct();
        $request =\think\Request::instance();
        $this->module     = $request->module();
        $this->controller = $request->controller();
        $this->action     = $request->action();
        if (!method_exists($this,$this->action ))
        {
            $this->error('非法操作');
        }
        $this->init();
    }

    public function init()
    {
        $log_config = array(
            'type'=>'File',
            'logPath'=> ROOT_PATH . "runtime/log/{$this->module}/{$this->controller}/{$this->action}/",
        );

        $this->logger = new Logger($log_config);
    }
    public function display($content = '', $vars = [], $replace = [], $config = [])
    {
        return parent::fetch($template = '', $vars = [], $replace = [], $config = []); // TODO: Change the autogenerated stub
    }
}