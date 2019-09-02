<?php


namespace Amap\core;

/**
 * 错误处理
 * Class Exception
 * @package Amap\core
 */
class AmapException extends \Exception
{
    public function __construct($message, $code = 0)
    {
        parent::__construct($message, $code);
    }

    public function __toString()
    {
        //重写父类方法，自定义字符串输出的样式
        return __CLASS__ . ":[" . $this->code . "]:" . $this->message . "<br>";
    }

    public function customFunction()
    {
        //为这个异常自定义一个处理方法
        echo "按自定义的方法处理出现的这个类型的异常<br>";
    }
}