<?php

namespace Amap\core;


abstract  class  RequestCent
{
    use HttpCent;

    protected $key;
    private $baseUrl = 'https://restapi.amap.com/v3/';
    protected $url; //地址
    protected $errorMsg;
    protected $response; //处理结果
    protected $error; //错误原因
    protected $errorCode = [
        '10001' => 'key不正确或过期',
        '10002' => '没有权限使用相应的服务或者请求接口的路径拼写错误',
        '10003' => '访问已超出日访问量',
        '10004' => '单位时间内访问过于频繁',
        '10005' => 'IP白名单出错，发送请求的服务器IP不在IP白名单内',
        '10006' => '绑定域名无效',
        '10007' => '数字签名未通过验证',
        '10008' => 'MD5安全码未通过验证',
        '10009' => '请求key与绑定平台不符',
        '10010' => 'IP访问超限',
        '10011' => '服务不支持https请求',
        '10012' => '权限不足，服务请求被拒绝',
        '10013' => 'Key被删除',
        '10014' => '云图服务QPS超限',
        '10015' => '受单机QPS限流限制',
        '10016' => '服务器负载过高',
        '10017' => '所请求的资源不可用',
        '10019' => '使用的某个服务总QPS超限',
        '10020' => '某个Key使用某个服务接口QPS超出限制',
        '10021' => '来自于同一IP的访问，使用某个服务QPS超出限制',
        '10022' => '某个Key，来自于同一IP的访问，使用某个服务QPS超出限制',
        '10023' => '某个KeyQPS超出限制',
        '20000' => '请求参数非法',
        '20001' => '缺少必填参数',
        '20002' => '请求协议非法',
        '20003' => '其他未知错误',
        '20011' => '查询坐标或规划点（包括起点、终点、途经点）在海外，但没有海外地图权限',
        '20012' => '查询信息存在非法内容',
        '20800' => '规划点（包括起点、终点、途经点）不在中国陆地范围内',
        '20801' => '划点（起点、终点、途经点）附近搜不到路',
        '20802' => '路线计算失败，通常是由于道路连通关系导致',
        '20803' => '起点终点距离过长。'
    ];//高德错误编码

    public function __construct($key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * 统一发起请求
     * @param $data
     * @return bool
     * @throws AmapException
     */
    protected function Conntent($data)
    {

        if (!is_array($data)) {
            throw new AmapException('请求的值,不是数组');
        }
        $data['key'] = $this->key; //钥匙

        $url = $this->baseUrl . $this->url . http_build_query($data);

        $response = $this->get($url);

        $response = json_decode($response, JSON_HEX_TAG); //结果
        if ($response['status'] == 0) {
            $this->error = $response['infocode'];
            $this->getError();
            return false;
        }
        $this->response = $response;
        return true;
    }

    /**
     * 获取从高德地图返回的数据
     * @return mixed
     */
    protected function getRespons()
    {
        return $this->response;
    }

    /**
     * 处理数据
     * @throws AmapException
     */
    protected function getError()
    {
        //如果errorCode不存在
        $errorCode = $this->errorCode;

        if ($errorCode === '') {
            throw new AmapException('处理错误失败');
        }
        //如果未发现原因
        if (!array_key_exists($this->error, $errorCode)) {
            throw new \Exception('位置错误:' . $this->error);
        }
        //处理错误结果
        $this->errorMsg = $errorCode[$this->error];
    }
}