<?php
namespace app\command;
class BaseCommand
{
    //a catalogue recode all script
    private $startTime;
    private $endTime;
    public function __construct()
    {
        $this->setStartTime();
    }
    public function setStartTime()
    {
        $this->startTime = microtime(true);
    }
    public function setEndTime()
    {
        $this->endTime = microtime(true);
    }
    //获取脚本运行时间
    public function getUseTime()
    {
        return round($this->endTime - $this->startTime, 4);
    }
}
