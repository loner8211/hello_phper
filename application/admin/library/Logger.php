<?php
namespace app\admin\library;

class Logger
{
    public $type;
    public $logPath;

    public function __construct($config)
    {
        isset($config['logPath']) && $this->setLogPath($config['logPath']);
        isset($config['type'])    && $this->setType($config['type']);

        return true;
    }

    /**
     *
     * @param $message
     * @param string $fileName
     * @param string $level
     * @param string $destination
     */
    function writeLog($message, $fileName = '',$level ='INFO',$destination=''){
        if (is_array($message) || is_object($message))
            $message = json_encode($message);

        $fileName = date('Ymd')."_{$level}" . ".log";
        $destination =  $this->logPath ? $this->logPath : APP_PATH . 'Runtime/Logs/';
        $prefix = "[{$level}] [" .date('Ymd H:i:s') . "] ";
        $suffix = "\n";
        if(!is_dir($destination)){
            mkdir($destination,0777,true);
        }
        file_put_contents($destination.$fileName, $prefix . $message . $suffix, FILE_APPEND);
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @param mixed $logPath
     */
    public function setLogPath($logPath)
    {
        $this->logPath = $logPath;
    }
}
