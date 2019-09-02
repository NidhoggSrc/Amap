<?php


namespace Amap\request\geocode;


use Amap\core\AmapException;
use Amap\core\RequestCent;
use Amap\model\GeocodeGeoModel;

class RegeoRequest extends RequestCent
{
    protected $url = 'geocode/regeo?';


    /**
     * 获取数据
     * @param $address
     * @param string $city
     * @return bool|GeocodeGeoModel
     * @throws \Amap\core\AmapException
     */
    public function getContents($location, $poitype = '', $radius = '3000', $extensions = 'base', $roadlevel = '0')
    {
        //extensions 只能等于 all 或者 base
        if ($extensions != 'base' and  $extensions != 'all') {
            throw new AmapException('返回基本地址信息 的值只能是base 或者all');
        }
        $data = array(
            'location' => $location,
            'poitype' => $poitype,
            'radius' => $radius,
            'extensions' => $extensions,
            'roadlevel' => $roadlevel,
        );

        $response = $this->Conntent($data);
        if ($response == false) {
            return false;
        }
        var_dump($this->getRespons());
//        return new GeocodeGeoModel($this->getRespons());
    }

    /**
     * 获取错误
     * @return mixed
     */
    public function getError()
    {
        return $this->errorMsg;
    }
}