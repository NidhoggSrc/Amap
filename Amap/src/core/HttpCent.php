<?php


namespace Amap\core;


trait HttpCent
{
    /**
     * post 请求
     * @param string $url
     * @param string $param
     * @return bool|string
     */
    protected function post($url = '', $param = '')
    {

        if (empty($url) || empty($param)) {
            return false;
        }

        $postUrl = $url;
        $curlPost = $this->setParam($param);
        $curl = curl_init();//初始化curl
        curl_setopt($curl, CURLOPT_URL, $postUrl);//抓取指定网页
        curl_setopt($curl, CURLOPT_HEADER, 0);//设置header
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($curl, CURLOPT_POST, 1);//post提交方式
        curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
        $data = curl_exec($curl);//运行curl
        curl_close($curl);

        return $data;
    }

    /**
     * get 请求
     * @param $url
     * @return bool|string
     */
    protected function get($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  // 跳过检查
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);  // 跳过检查
        $tmpInfo = curl_exec($curl);
        curl_close($curl);
        return $tmpInfo;   //返回json对象
    }

    protected function setParam($param)
    {
        $o = "";
        foreach ($param as $k => $v) {
            $o .= "$k=" . urlencode($v) . "&";
        }
        $param = substr($o, 0, -1);
        return $param;
    }
}