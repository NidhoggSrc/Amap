<?php

namespace Amap\request;

interface RequestInterFace
{
    /**
     * 获取数据
     * @return mixed
     */
    public function getContents();

    /**
     * 获取错误
     * @return mixed
     */
    public function getError();

}